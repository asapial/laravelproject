#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main() {
    freopen("input.txt", "r", stdin);

    for (int i = 0; i <500; ++i) {
        // Create the filename
        
        string filename;
        getline(cin, filename);

        filename+=".html";

        // Open a file stream
        ofstream file(filename);

        // Check if the file is open
        if (file.is_open()) {
            // Write a basic HTML structure to the file
            file << "<!DOCTYPE html>\n";
            file << "<html>\n";
            file << "<head>\n";
            file << "    <title>Lesson " << i << "</title>\n";
            file << "</head>\n";
            file << "<body>\n";
            file << "</body>\n";
            file << "</html>";

            // Close the file
            file.close();

            cout << "Created: " << filename << endl;
        } else {
            cerr << "Unable to open file: " << filename << endl;
        }
    }
    return 0;
}
