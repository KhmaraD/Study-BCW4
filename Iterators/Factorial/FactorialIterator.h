#ifndef FACTORIALITERATOR_H
#define FACTORIALITERATOR_H

#include <iostream>

class InvalidParam {};

class FactorialIterator {
	private:
		int index;
		int current;
		int result;
		
	public:
		FactorialIterator(int index = 10);
		~FactorialIterator();

		void next();
		void prev();
		bool over();
		int value();
		int begin();

		void operator++();
		void operator++(int);
		void operator--();
		void operator--(int);
		int operator*();
};

#endif // FACTORIALITERATOR_H

