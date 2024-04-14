function generateTransactionId() {
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var transactionId = '';
    for (var i = 0; i < 10; i++) {
        transactionId += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return transactionId;
}
