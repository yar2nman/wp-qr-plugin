
var mfile = "";
var filename = "";
var brandname = "";
var productname = "";
var selected = null;
var username = "";
var useremail = "";
var friendname = "";
var friendemail = "";


$(document).ready(function(){
$('.mimg').click(function(event){
    event.preventDefault();
    $('#selectfile').click();
});
});

function fileSelected(fpath) {
    console.log(fpath);
    if (fpath.length == 0) {
        mfile = "";
        $('.mimg').text('No file selected');
    }else {
        const [file] = selectfile.files;
                if (file) {
                    var x = URL.createObjectURL(file)
                    console.log(x)
                    $('.mimg').attr("src",x);
                }
        // $('.mimg').hide();
    }    
}

$(document).ready(function(){
    console.log(document.title);
    console.log(document.URL);

    console.log('createcode');
    if (document.getElementById("qrboxid")) {
        
        new QRCode(document.getElementById("qrboxid"), {text: "http://localhost:8080/qrcode/qrcode.png?user:ahmed&name:Ali&code:123",
        width: 256,
        height: 200,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H});
    }

})

function PrintToPDF(divSelector) {
    // divSelecttor = "#divId"
    var divContents = $(divSelector).html();
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>DIV Contents</title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
};