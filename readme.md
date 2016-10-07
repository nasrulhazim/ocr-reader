# Basic OCR Reader

**Installation**

Install [Tessearct](https://github.com/tesseract-ocr/tesseract/wiki)

Clone this repository

	```
	git clone https://github.com/nasrulhazim/ocr-reader.git
	```

Create database, username and password and configure your database connection in `.env` file.

Go into the application `cd ocr-reader` and run `php artisan migrate`.

Run `php artisan serve` to start using the application. You may register first before start using the reader.