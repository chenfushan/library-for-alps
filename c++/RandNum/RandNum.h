//
//  RandNum.h
//  
//  For get a rand number
//
//  Created by Alps on 15/10/23.
//  Copyright (c) 2015年 chen. All rights reserved.
//

#include <iostream>
#include <time.h>

using namespace std;
/**
 * This class is for get a rand number
 */
class RandNum
{
public:
	RandNum();
	~RandNum();
	/**
	 * get a rand num int
	 * @return int
	 */
	int GetRandNum();
	/**
	 * get a rand number big than start
	 * @param        the min number of rand start
	 * @return       int number big than start
	 */
	int GetRandNum(int start);
	/**
	 * get a rand number between start and end
	 * @param  start min number of rand
	 * @param  end   max number of rand
	 * @return       int number between start and end
	 */
	int GetRandNum(int start, int end);
};