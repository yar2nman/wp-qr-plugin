
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
    // divSelector = "#divId"
    var divContents = $(divSelector).html();
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>DIV Contents</title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
};

function exportTableToExcel(tableID, filename = ''){
    // to use the function
    // <button onclick="exportTableToExcel('tableID', 'excelFileName')">Export Table Data To Excel File</button>
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        downloadLink.download = filename;
        
        downloadLink.click();
    }
}

function exportDataToCSV(data, fileName = 'dataFile') {

    let csvContent = "data:text/csv;charset=utf-8,";
    
    data.forEach(function(rowArray) {
        let row = rowArray.join(",");
        csvContent += row + "\r\n";
    });

    var encodedUri = encodeURI(csvContent);

    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", fileName + ".csv");
    document.body.appendChild(link);

    link.click();

    /*
        // Usage of exportDataToCSV function
        const rows = [
            ["name1", "city1", "some other info"],
            ["name2", "city2", "more info"]
        ];

        exportDataToCSV(rows, "DataFileName");
    */
}