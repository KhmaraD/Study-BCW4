#include "PrimeIterator.h"

PrimeIterator::PrimeIterator(int number) {
	this->number = number;
	this->current = 1;
	this->limit = 1;
	this->array = (int*)malloc(number*sizeof(int));
	
	if ( array == NULL ) {
		throw OutOfMemory();
	}
	this->array[1] = 2;
}

PrimeIterator::~PrimeIterator() {}

void PrimeIterator::next() {

	if ( this->limit == this->current ) {
		for ( int i = this->array[current] + 1; i <= i; i++ ) {
			bool prime = true;

			for ( int j = 2; j <= sqrt(i); j++ ) {
				if ( i % j == 0 ) {
					prime = false;
					break;
				}
			}
			if ( prime ) {
				this->current += 1;
				this->limit = this->current;
				this->array[current] = i;
				break;
			}
		}
	} else {
		this->current += 1;
	}
}

void PrimeIterator::previous() {
	if ( this->current < 0 ) {
		return;
	}
	this->current -= 1;
}
bool PrimeIterator::over() {
	return (this->current > this->number);
}
int PrimeIterator::getValue() {
	return this->array[this->current];
}
void PrimeIterator::begin() {
	this->current = 1;
}

void PrimeIterator::operator++() {
	this->next();
}
void PrimeIterator::operator++(int) {
	this->operator++();
}
void PrimeIterator::operator--() {
	this->previous();
}
void PrimeIterator::operator--(int) {
	this->operator--();
}
int PrimeIterator::operator*() {
	return this->getValue();
}
