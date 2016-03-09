
//	NumArray.h
//	
//	Created by ALps on 16/3/10
//	Copyright chen, All right reserved.
//

#include <iostream>
#include <vector>

using namespace std;

#ifndef BIT_h
#define BIT_h

class BIT {
private:
	vector<int> arr;
public:
    NumArray(vector<int> &nums) {
        arr.push_back((int)nums.size());
        for(int i = 0; i < nums.size(); ++i){
            int nextLoc = lowbit(i+1)-1;
            arr.push_back(nums[i]);
            while(nextLoc){
                arr[i+1] += nums[i-nextLoc];
                nextLoc--;
            }
        }
    }
    
    void update(int i, int val) {
        int curVal = val - sumRange(i, i);
        int nextLoc = i+1;
        while(nextLoc <= arr[0]){
            arr[nextLoc] += curVal;
            nextLoc += lowbit(nextLoc);
        }
    }
    
    int lowbit(int x){
        return x&(-x);
    }
    
    int sumRange(int i, int j) {
        int sum = 0;
        int nextLoc = j + 1;
        while(i){
            sum += arr[i];
            i -= lowbit(i);
        }
        sum = -sum;
        while(nextLoc){
            sum += arr[nextLoc];
            nextLoc -= lowbit(j);
        }
        return sum;
    }
    
};

#endif
