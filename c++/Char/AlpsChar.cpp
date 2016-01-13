//
//  AlpsChar.cpp
//  examData
//
//  Created by Alps on 16/1/13.
//  Copyright © 2016年 chen. All rights reserved.
//

#include "AlpsChar.h"

namespace AlpsChar {
    std::string AlpsCharToString(char ch){
        std::stringstream AlpsStream;
        AlpsStream<<ch;
        return AlpsStream.str();
    }
}

