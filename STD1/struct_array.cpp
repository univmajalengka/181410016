#include <iostream>
#include <string>
#include <sstream>
#define awalan using namespace std

awalan;

struct daftar_t
{
	string merkHp;
	int harga;
} daftar[3];

void printbook(daftar_t book);

int main()
{
	string mystr;
	int n;
		for (n=0; n<3; n++) 
		{
			cout << "Masukan Merk Hp: ";
			getline (cin, daftar[n].merkHp);
			cout << "Masukan Harga:Rp. ";
			getline (cin,mystr);
			stringstream(mystr) >> daftar[n].harga;
		}

	cout << "\nAnda telah memasukan data HP dibawah ini:\n";
		for (n=0; n<3; n++)
			printbook(daftar[n]);

return 0;

}


void printbook(daftar_t book)
{
	cout << book.merkHp << "\t";
	cout << "Rp. " << book.harga << ",- \n";
}
