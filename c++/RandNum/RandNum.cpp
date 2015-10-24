//
//  RandNum.h
//  
//  For get a rand number
//
//  Created by Alps on 15/10/23.
//  Copyright (c) 2015年 chen. All rights reserved.
//

#include "RandNum.h"

using namespace std;

RandNum::RandNum(){};

RandNum::~RandNum(){};

int RandNum::GetRandNum(){
	srand((unsigned)time(NULL));
	return rand();
}

int RandNum::GetRandNum(int start){
	srand((unsigned)time(NULL));
	return (rand()+start);
}

int RandNum::GetRandNum(int start, int end){
	if (end < start) {
        return 0;
    }
    if (end == start)
    {
    	return start;
    }
    srand((unsigned)time(NULL));
    return (rand()%(end-start) + start);
}

// this is example
// int main(int argc, char const *argv[])
// {
// 	RandNum *num = new RandNum();
// 	printf("%d\n", num->GetRandNum(10,9));
// 	return 0;
// }