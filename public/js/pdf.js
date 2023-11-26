import { jsPDF } from "jspdf";

export function generatePDF() {
    // Your PDF generation code here
    const doc = new jsPDF();
    doc.text("Hello, this is a PDF!", 10, 10);
    doc.save("sample.pdf");
}