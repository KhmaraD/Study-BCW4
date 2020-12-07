#include <iostream>
#include "FibonacciIterator.h"

using namespace std;

int main() {
    FibonacciIterator seq(0, 10);

    for ( ; !seq.over(); seq++ ) {
        cout << *seq << ' ';
    }
    cout << *seq << endl;
    
    // FibonacciIterator seq(0, 10);

    // for (; !seq.over(); seq++) {
    //     cout << *seq << endl;
    // }
    
	return 0;
}