#include <iostream>
#include "PrimeIterator.h"

int main() {
	PrimeIterator seq(5);

	for (; !seq.over(); seq++) {
		std::cout << *seq << ' ';
	}
    // std::cout << std::endl;

	return 0;
}