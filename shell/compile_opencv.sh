#!/bin/bash
if [ ! -n $1 ] ;then
	echo 'no input first argument'
fi
if [ ! -n $2 ] ;then
	echo 'no input second argument'
fi
g++ $1 -o $2 `pkg-config --cflags --libs opencv`
