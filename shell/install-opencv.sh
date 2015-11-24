#!/bin/bash

###########################################################
#
# OpenCV 3.0.0 alpha - instalação
# http://opencv.org/
#
###########################################################

#----------------------------------------------------------
# Criando um logger para registrar a instalação
#----------------------------------------------------------
# Tempo: início
dateformat="+%a %b %-eth %Y %I:%M:%S %p %Z"
starttime=$(date "$dateformat")
starttimesec=$(date +%s)

# Pega o diretório atual
curdir=$(cd `dirname $0` && pwd)

# Cria o arquivo onde as ações ficarão registradas
logfile="$curdir/install-opencv.log"
rm -f $logfile

# Logger simples
log(){
	timestamp=$(date +"%Y-%m-%d %k:%M:%S")
	echo "\n$timestamp $1"
	echo "$timestamp $1" >> $logfile 2>&1
}
 
# Iniciando a instalação do OpenCV 3.0.0
log "Iniciando a instalação do OpenCV 3.0.0"


#----------------------------------------------------------
# Assegurando um ambiente atualizado
#----------------------------------------------------------

# Informa ao usuário a próxima ação
log "Executando apt-get update e apt-get upgrade"
 
# Executa a ação
sudo apt-get update
sudo apt-get upgrade

 
#----------------------------------------------------------
# Instalando os pacotes das dependências
#----------------------------------------------------------

log "Instalando as dependências"
 
# Executa a ação
sudo apt-get -y install libopencv-dev build-essential cmake git libgtk2.0-dev pkg-config python-dev python-numpy libdc1394-22 libdc1394-22-dev libjpeg-dev libpng12-dev libtiff4-dev libjasper-dev libavcodec-dev libavformat-dev libswscale-dev libxine-dev libgstreamer0.10-dev libgstreamer-plugins-base0.10-dev libv4l-dev libtbb-dev libqt4-dev libfaac-dev libmp3lame-dev libopencore-amrnb-dev libopencore-amrwb-dev libtheora-dev libvorbis-dev libxvidcore-dev x264 v4l-utils unzip
 
 
#----------------------------------------------------------
# Instalando OpenCV
#----------------------------------------------------------

log "Baixando a biblioteca OpenCV 3.0.0"
 
# Definição de constante
FOLDER_NAME="opencv"
 
# Cria um novo diretório para armazenar o código-fonte
mkdir ${FOLDER_NAME}
 
# Entra no diretório
cd ${FOLDER_NAME}
 
# Baixa o código-fonte
wget https://github.com/Itseez/opencv/archive/3.0.0-alpha.zip -O opencv-3.0.0-alpha.zip
 
# Extrai o conteúdo
unzip opencv-3.0.0-alpha.zip

log "Instalando a biblioteca OpenCV 3.0.0"
 
# Entra no diretório
cd opencv-3.0.0-alpha
 
# Cria um diretório chamado 'build'
mkdir build
 
# Entra no diretório
cd build
 
# Constrói o projeto usando CMake
cmake -D CMAKE_BUILD_TYPE=RELEASE -D CMAKE_INSTALL_PREFIX=/usr/local -D WITH_TBB=ON -D WITH_V4L=ON -D WITH_QT=ON -D WITH_OPENGL=ON ..
 
# Compila o projeto
make -j $(nproc)
 
# Instala as bibliotecas na pasta apropriada
sudo make install
 
# Adiciona o caminho das bibliotecas do OpenCV aos caminhos de pesquisa de biblioteca padrão do Ubuntu
sudo /bin/bash -c 'echo "/usr/local/lib" > /etc/ld.so.conf.d/opencv.conf'
 
# Atualiza os caminhos de pesquisa de biblioteca padrão do Ubuntu
sudo ldconfig
 
# Informa ao usuário que o OpenCV foi instalado com sucesso!
log "OpenCV 3.0.0 foi instalado com sucesso!"

#----------------------------------------------------------
# Mostra tempo gasto com a instalação
#----------------------------------------------------------

# Tempo: fim
endtime=$(date "$dateformat")
endtimesec=$(date +%s)

# Mostra tempo gasto com a instalação
elapsedtimesec=$(expr $endtimesec - $starttimesec)
ds=$((elapsedtimesec % 60))
dm=$(((elapsedtimesec / 60) % 60))
dh=$((elapsedtimesec / 3600))
displaytime=$(printf "%02d:%02d:%02d" $dh $dm $ds)
log "Tempo gasto: $displaytime\n"
