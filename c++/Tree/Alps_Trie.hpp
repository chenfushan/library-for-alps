//
//  main.cpp
//  TrieTree
//
//  Created by Alps on 16/4/9.
//  Copyright © 2016年 chen. All rights reserved.
//

#include <iostream>
#include <cstring>
#include <string>

using namespace std;

#ifndef BranchNum
#define BranchNum 26
#endif

class Alps_Trie{
public:
    Alps_Trie(){
        root = new TreeNode();
    }
    void addNode(string str){
        TreeNode *node = root;
        for (int i = 0; i < str.length(); i++) {
            int pos = transToInt(str[i]);
            if (node->children[pos] == NULL) {
                node->children[pos] = new TreeNode();
            }
            node = node->children[pos];
        }
        if (node->flag == 0) {
            node->flag = 1;
        }
    }
    
    bool searchTree(string str){
        TreeNode * node = root;
        for (int i = 0; i < str.length(); i++) {
            int pos = transToInt(str[i]);
            if (node->children[pos] == NULL) {
                return false;
            }
            node = node->children[pos];
        }
        if (node->flag != 0) {
            return true;
        }
        return false;
    }
private:
    /**
     *  字典树节点结构
     */
    struct TreeNode {
        int flag; //记录单词信息
        TreeNode * children[BranchNum];
        TreeNode(){
            for(int i = 0; i < BranchNum; i++){
                children[i] = NULL;
            }
            flag = 0;
        }
    };
    
    /**
     *  把每个节点要存储的数据转换成int
     *
     *  @param ch 字符
     *
     *  @return 返回下标
     */
    int transToInt(char ch){
        int temp = ch - 'a';
        return temp;
    }
    
    /**
     *  char to string
     *
     *  @param arr char
     *
     *  @return string
     */
    string transCharToString(char *arr){
        return string(arr);
    }
    
    string transIntToString(int num){
        char alps_temp;
        string alps_str = "";
        while (num) {
            alps_temp = num%10 + '0';
            alps_str += alps_temp;
            num/=10;
        }
        return alps_str;
    }
    
    TreeNode * root;
};




int main(int argc, const char * argv[]) {
    Alps_Trie* root = new Alps_Trie();
    string str;
    cout<<"Please input words in dictionary"<<endl;
    for (int i = 0; i < 3; i++) {
        cin>>str;
        root->addNode(str);
    }
    cout<<"Please input words you want to search"<<endl;
    cin>>str;
    if(root->searchTree(str)){
        cout<<"YES"<<endl;
    }else{
        cout<<"NO"<<endl;
    }
    return 0;
}
