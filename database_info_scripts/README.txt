Run scripts in the following order to create cvs files:
1. receiptContainsProduct.py (adjust the number of receipts you want and the total number of products currently in the products.cvs file)
2. receipts.py 
3. receiptFromStore.py

__________________________________________________________________________


.csv files contain database information. Every row is a different tuple, every atribute is separated by " symbol. 
To import into Excel:
1. New file
2. Import
3. .csv file (select file)
4. Data type: delimited and click next
5. Separators ONLY select Other and type inside "
6. Finalize

__________________________________________________________________________


DEFINITIONS OF EVERY TABLE BELOW

user.csv
UserID[UXXXXXXXX] (a U and 8 numbers right after), email[no spaces], username[no spaces], age[INT], gender[M/F], password[no spaces] 

receipt.csv
ReceiptID [RXXXXXXXX] (a R and 8 numbers right after), timeDate[must look up how the SQl standard does it], preTaxPrice[double], totalPrice[double]

product.csv
ProductID [PXXXXXXXX] (a P and 8 numbers right after), name[string], brand[string]

store.csv
StoreID [SXXXXXXXX] (a S and 8 numbers right after), name[string], location[string]

userHasReceipt.csv
userID, ReceiptID

receiptContainsProduct.csv
ReceiptID, productID, quantity

productSoldAt.csv
productID, storeID, price

receiptFromStore.csv
receiptID, storeID
