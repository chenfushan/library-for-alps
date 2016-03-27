//
//  AlpsChar.cpp
//  examData
//
//  Created by Alps on 16/1/13.
//  Copyright © 2016年 chen. All rights reserved.
//

#include "AlpsChar.h"


namespace AlpsChar {
	using namespace std;
    std::string AlpsCharToString(char ch){
        std::stringstream AlpsStream;
        AlpsStream<<ch;
        return AlpsStream.str();
    }
    std::string AlpsBigIntegerMultiplication(std::string num1, std::string num2){
        reverse(num1.begin(), num1.end());
        reverse(num2.begin(), num2.end());
        int num1Length = (int)num1.length();
        int num2Length = (int)num2.length();
        int *number1 = (int*)malloc(num1Length * sizeof(int));
        int *number2 = (int*)malloc(num2Length * sizeof(int));
        int *result = (int*)malloc((num1Length + num2Length) * sizeof(int));
        memset(result, 0, sizeof(int)*(num1Length+num2Length));
        for (int i = 0; i < num1Length; i++) {
            number1[i] = (int)(num1[i] - '0');
        }
        for (int i = 0; i < num2Length; i++) {
            number2[i] = (int)(num2[i] - '0');
        }
        for (int i = 0; i < num1Length; i++) {
            for (int j = 0; j < num2Length; j++) {
                result[i+j] += number1[i] * number2[j];
            }
        }
        for (int i = 0; i < num1Length+num2Length-1; i++) {
            if (result[i] >= 10) {
                result[i+1] += result[i] / 10;
                result[i] = result[i] % 10;
            }
        }
        int resultLength = 0;
        for (resultLength = num1Length+num2Length-1; resultLength > 0; resultLength--) {
            if (result[resultLength] != 0) {
                break;
            }
        }
        if (resultLength == 0) {
            return "0";
        }
        char *res = (char*)malloc(sizeof(int) * (resultLength+1));
        for (int i = 0; i <= resultLength; i++) {
            res[i] = (char)(result[i] + '0');
        }
        string resStr(res);
        reverse(resStr.begin(), resStr.end());
        return resStr;
    }
}

