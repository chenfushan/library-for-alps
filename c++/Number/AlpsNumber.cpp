//
//  AlpsNumber.cpp
//  Miller_Rabin
//
//  Created by Alps on 16/6/5.
//  Copyright © 2016年 chen. All rights reserved.
//

#include "AlpsNumber.hpp"


namespace AlpsNumber {
    /**
     *  get a random number between 2 and mx
     *
     *  @param mx max number
     *
     *  @return random number between 2 and mx
     */
    ll Alps_rand_Number(ll mx){
        return rand()%mx+1;;
    }
    
    ll Alps_mult_mod(ll Alps_multiplier_a,ll Alps_multiplier_b,ll Alps_remainder){
        Alps_multiplier_a %= Alps_remainder;
        Alps_multiplier_b %= Alps_remainder;
        ll Alps_remainder_res = 0;
        while(Alps_multiplier_b){
            if(Alps_multiplier_b & 1){
                Alps_remainder_res += Alps_multiplier_a;
                Alps_remainder_res %= Alps_remainder;
            }
            Alps_multiplier_a <<= 1;
            Alps_multiplier_a %= Alps_remainder;
            Alps_multiplier_b >>= 1;
        }
        return Alps_remainder_res;
    }
    
    /**
     *  return remainder for base^power % num
     *
     *  @param base  base number
     *  @param power power number
     *  @param num   exam number
     *
     *  @return remainder
     */
    ll Alps_exponentiation_mod(ll base,ll power, ll num){
        ll Alps_cur = 1;
        ll Alps_nxt = base;
        while (power) {
            if (power&1) {
                Alps_cur = Alps_mult_mod(Alps_cur, Alps_nxt, num);
            }
            Alps_nxt = Alps_mult_mod(Alps_nxt, Alps_nxt, num);
            power = power>>1;
        }
        return Alps_cur;
    }
    
    /**
     *  exam if a long long number is palindrome
     *
     *  @param num long long number
     *
     *  @return palindrome return true otherwise return false
     */
    bool AlpsProbablyPalindrome(ll num){
        srand((unsigned)time(NULL));
        int Alps_S = 20; //exam times in Miller_Rabin
        if (num == 2) {
            return true;
        }
        if (num < 2 || num % 2 == 0) {
            return false;
        }
        ll Alps_power = num-1;
        
        while (Alps_power % 2 == 0) {
            Alps_power /= 2;
        }
        for (int i = 0; i < Alps_S; i++) {
            ll Alps_base = Alps_rand_Number(num-1);
            ll Alps_cur_mod = Alps_exponentiation_mod(Alps_base, Alps_power, num);
            ll Alps_temp_mod = Alps_cur_mod;
            ll Alps_temp_power = Alps_power;
            while (Alps_temp_power < num) {
                Alps_temp_mod = Alps_mult_mod(Alps_cur_mod, Alps_cur_mod, num);;
                if (Alps_temp_mod == 1 && Alps_cur_mod != 1 && Alps_cur_mod != num-1) {
                    return false;
                }
                Alps_cur_mod = Alps_temp_mod;
                Alps_temp_power *= 2;
            }
            if (Alps_cur_mod!= 1) {
                return false;
            }
        }
        return true;
    }

}

//int main(){
//    ll m,n;
//    scanf("%lld", &m);
//    for (int i = 0; i < m; i++) {
//        scanf("%lld", &n);
//        
//        if (AlpsNumber::AlpsProbablyPalindrome(n)) {
//            std::cout<<"Yes"<<std::endl;
//            continue;
//        }else{
//            std::cout<<"No"<<std::endl;
//            continue;
//        }
//    }
//    
//    return 0;
//}