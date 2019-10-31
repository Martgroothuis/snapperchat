

function generatekeys() {
    if (document.getElementById('passphrase').value) {
        passphrase = document.getElementById('passphrase').value;
    } else {
        passphrase = generatePassphrase(1024);
    }
    document.getElementById('passphrase').value = passphrase;

    pubkey = generatePubKey(passphrase);
    document.getElementById('pubkey').value = pubkey;

    var downloadkeys = "pubkey: " + pubkey + "\r\npassphrase: " + passphrase + "\r\n\r\nnever share your passphrase!";


    return downloadkeys;
}


function generatePassphrase(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}


function generatePubKey(passPhrase) {

    var RSAkey = generateRSAkey(passPhrase);

    var pubKey = cryptico.publicKeyString(RSAkey);

    return pubKey;
}

function generateRSAkey(passPhrase) {

    var Bits = 1024;

    var RSAkey = cryptico.generateRSAKey(passPhrase, Bits);

    return RSAkey;
}


function encryptMessage(pubKey, message) {

    var EncryptionResult = cryptico.encrypt(message, pubKey);

    return EncryptionResult;
}



function decryptMessage(message, passPhrase) {

    RSAkey = generateRSAkey(passPhrase);

    var DecryptionResult = cryptico.decrypt(message, RSAkey);

    return DecryptionResult;
}

function download(data, filename) {
    var a = document.createElement("a"),
        file = new Blob([data], {type: "text/plain;charset=utf-8"});
    if (window.navigator.msSaveOrOpenBlob) // IE10+
        window.navigator.msSaveOrOpenBlob(file, filename);
    else { // Others
        var url = URL.createObjectURL(file);
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        setTimeout(function () {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        }, 0);
    }
}



</script>
