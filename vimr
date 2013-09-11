set fencs=utf-8,gbk
set fileencoding=gb18030
set fileencodings=utf-8,gb18030,utf-16,big5

syntax on   "语法高亮

syntax enable   "打开色彩
set bg=dark
set mouse=a "启动鼠标
set ai
set showmatch
set nu  "显示行号
set numberwidth=4
set wrap    "拆行
set shiftwidth=2 "缩进距离
set smartindent "智能对齐
"set whichwrap=+h,l  "hl能够换行
"set expandtab "使得文件没有tab 转换为空格
filetype plugin on
set autochdir
set tabstop=2
set helplang=cn
:map <F6> :tabprevious<CR>
:map <F7> :tabnext<CR>
set textwidth=80
set foldmethod=syntax "折叠代码

"set Tag list
"===========================================================
"exuberant_ctags
"http://www.vim.org/scripts/script.php?script_id=273
:map <F2> :TlistToggle<CR>
let Tlist_File_Auto_Close=1
let Tlist_lnc_Winwidth=0

"===========================================================

set linebreak
set ignorecase "忽略大小写
"set cindent "对C语言的缩进
set fileformats=unix,dos,mac

"set scheme
colorscheme default

"与windows共享剪贴板
"set clipboard+=unnamed

"map
"===========================================================
"insert map ctrl+d = esc dd i
"ctrl+u = esc u i
"zz is quit without save
:imap <c-d> <esc>ddi
:imap <c-u> <esc>ui
:nnoremap zz :q!<cr>
:nnoremap ss :w<cr>
:nnoremap <tab> >>
:nnoremap qq <esc>
:nnoremap L $
:nnoremap H ^

"编辑vimrc文件
:nnoremap <leader>ev :vsplit $MYVIMRC<cr>
"============================================================

"缩写
:iabbrev chenid ----- <cr>Alps<cr>chenfushan1992@gmail.com
:iabbrev inc #include<><esc>i


"autocommand
"============================================================	
":autocmd BufNewFile * :write
"         ^          ^ ^
"         |          | |
"         |          | The command to run.
"         |          A "pattern" to filter the event.
"         The "event" to watch for.
:autocmd BufNewFile *.txt :write
":autocmd BufWritePre *.html :normal gg=G
"
:autocmd FileType c* :iabbrev ife if()<cr>{<cr>}else<cr>{<cr>}<esc>kkkkk$ww
:autocmd FileType c* :iabbrev for( for(int i=;i<;++i)<cr>{<cr>}<esc>kkk$wwww
:autocmd FileType c* :iabbrev while( while()<cr>{<cr>}<esc>kkw
:autocmd FileType c* :iabbrev switch( switch()<cr>{<cr>}<esc>kkw
:autocmd FileType cpp :iabbrev class{ class<cr>{<cr>}<esc>kklll
:autocmd FileType python set shiftwidth=4
:autocmd FileType python set tabstop=4
"
":autocmd BufWrite * :echom "writing buffer"
"=============================================================

"Statusline set
"=============================================================
:set laststatus=2
:set statusline=%f\ [FileType:%Y]\ [line:%l/%L]

"===========================================================o=
