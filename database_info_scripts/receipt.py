import sys
from random import randint

array_receipt_ID = []
array_price  = []
file = open('receiptContainsProduct.csv', 'r') 
prev_receiptID = -1
first_time = 1
total_price = 0.0
price = 0.0

for line in file:
	receipt_ID, product_ID, quantity, price = line.split(';')
	price = float(price)
	if prev_receiptID != receipt_ID and not (first_time) :
		array_receipt_ID.append(prev_receiptID)
		array_price.append(total_price)
		total_price = price

	else:
		total_price = total_price + price
		first_time = 0
	
	prev_receiptID = receipt_ID

array_receipt_ID.append(prev_receiptID)
array_price.append(total_price)
total_price = price

file.close()

file = open('receipt.csv', 'w') 
tax = 0.025
i = 0
year = 2015

for x in array_receipt_ID:

	tax_price = array_price[i] + array_price[i] * tax
	tax_price = '%.2f' % tax_price
	
	month = randint(1,12)
	month = str('%02d' % month)
	day = randint(1,28)
	day = str ('%02d' % day)
	hour = randint(0,23)
	hour = str ('%02d' % hour)
	minutes = randint(0,59)
	minutes = str ('%02d' % minutes)
	seconds = randint(0,59)
	seconds = str ('%02d' % seconds)

	file.write (array_receipt_ID[i] + ';' )
	file.write ('2015-' +  month + '-' + day )
	file.write ( 'T' + hour + ':' + minutes + ':' + seconds + ';' )
	file.write ( str(array_price[i]) + ';' )
	file.write ( str(tax_price) + '\n')

	i = i + 1

file.close()