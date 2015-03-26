import sys
from random import randint
#Define max and mins for random generators
total_receipts = 200
total_product_ID = 467
max_quantity = 5
max_individual_price = 8
min_products = 4
max_products = 50

file = open('receiptContainsProduct.csv', 'w') 

#Forloop for every receipt
for receipt_counter in range (total_receipts):
	receipt_ID = '%08d' % receipt_counter
	total_products =  randint(min_products,max_products)
	
	#Forloop for every item in receipt
	for product_counter in range (0, total_products):
		product_ID  = randint(0,total_product_ID)
		product_ID = '%08d' % product_ID
		
		#Define product quantity
		if product_counter % 10 == 0:
			total_quantity = randint(1,max_quantity)
		else:
			total_quantity = 1
		
		#Define price randomly - SHOULD BE IMPROVED
		price_full = randint(0,max_individual_price)
		price_decimal = randint(0,99)
		price_decimal = price_decimal * 0.01
		price = price_full + price_decimal
		if price == 0:
			price = 0.50
		total_price = total_quantity * price
		total_price = '%.2f' % total_price
	
		#Write to file
		file.write ('R' + str(receipt_ID) + ';' )
		file.write ('P' + str(product_ID) + ';' )
		file.write ( str(total_quantity) + ';' )
		file.write ( str(total_price) + '\n')

file.close()
