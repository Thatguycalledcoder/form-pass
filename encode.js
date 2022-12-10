// Initialize object
window.jsPDF = window.jspdf.jsPDF;

// Convert HTML content to PDF
function Convert_HTML_To_PDF() {
    var doc = new jsPDF();
	
    // Source HTMLElement or a string containing HTML.
    var elementHTML = document.querySelector("#contentToPrint");

    doc.html(elementHTML, {
        callback: function(doc) {
            // Save the PDF
            doc.save('passport-document.pdf');
        },
        margin: [10, 10, 10, 10],
        autoPaging: 'text',
        x: 0,
        y: 0,
        width: 150, //target width in the PDF document
        windowWidth: 1400 //window width in CSS pixels
    });
}