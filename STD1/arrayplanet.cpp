#include <iostream>
using namespace std;
char planet [8][10] = {"Merkurius","Venus","Bumi","Mars","Yupiter","Saturnus","Uranus","Neptunus"};
int n;
int main()
{
	cout <<"Masukkan urutan planet dari jarak matahari dimulai dari 0 (dekat ke jauh) : ";
	cin>> n;
	cout <<"Nama planet tersebut adalah :";
	cout << " " <<planet[n];
	return 0;
}
