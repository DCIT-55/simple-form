from fpdf import FPDF

# Create a PDF instance
pdf = FPDF()
pdf.set_auto_page_break(auto=True, margin=15)
pdf.add_page()
pdf.set_font("Arial", size=12)

# Add a title
pdf.set_font("Arial", style="B", size=16)
pdf.cell(0, 10, "Project Reviewer", ln=True, align="C")
pdf.ln(10)

# Add a project overview
pdf.set_font("Arial", style="B", size=14)
pdf.cell(0, 10, "Project Overview", ln=True)
pdf.set_font("Arial", size=12)
pdf.multi_cell(0, 10, """
This project is a simple PHP-based web application that allows users to submit their information and view, edit, or delete records from a database. 
The application uses a MySQL database for data storage and includes a clean, user-friendly interface.
""")
pdf.ln(5)

# Add a section for the workspace structure
pdf.set_font("Arial", style="B", size=14)
pdf.cell(0, 10, "Workspace Structure", ln=True)
pdf.set_font("Arial", size=12)
pdf.multi_cell(0, 10, """
The workspace contains the following files, each serving a specific purpose:
""")
pdf.ln(5)

# Add details for each file
files = {
    "db_config.php": "Contains the database connection configuration, including credentials and connection setup.",
    "index.php": "The main entry point of the application. It includes a form for submitting user information and displays success or error messages.",
    "view_data.php": "Displays the list of records from the database in a simple table format.",
    "view_data_v2.php": "An enhanced version of 'view_data.php' with additional features or improved styling.",
    "edit.php": "Allows users to edit existing records in the database.",
    "delete.php": "Handles the deletion of records from the database.",
    "update.php": "Processes updates to existing records in the database."
}

for file, description in files.items():
    pdf.set_font("Arial", style="B", size=12)
    pdf.cell(0, 10, file, ln=True)
    pdf.set_font("Arial", size=12)
    pdf.multi_cell(0, 10, description)
    pdf.ln(3)

# Add a conclusion
pdf.set_font("Arial", style="B", size=14)
pdf.cell(0, 10, "Conclusion", ln=True)
pdf.set_font("Arial", size=12)
pdf.multi_cell(0, 10, """
This project demonstrates the use of PHP and MySQL to build a basic CRUD (Create, Read, Update, Delete) application. 
It is a great starting point for learning how to build dynamic web applications with server-side scripting and database integration.
""")

# Save the PDF
pdf.output("Project_Reviewer.pdf")

# Print success message
print("Reviewer created successfully as 'Project_Reviewer.pdf'")