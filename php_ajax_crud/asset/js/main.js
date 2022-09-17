function fetchEmployee()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loader").style.display = 'block';
            setTimeout(() => {
                document.getElementById("loader").style.display = 'none';
                document.getElementById("main").innerHTML = this.responseText;
            }, 750);
        }
    };
    xmlhttp.open("GET","inc/read-employee.php",true);
    xmlhttp.send();
}

function navigateToAddEmployee()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loader").style.display = 'block';
            const element = document.getElementById("readEmployee");
            element.remove();
            setTimeout(() => {
                document.getElementById("loader").style.display = 'none';
                document.getElementById("main").innerHTML = this.responseText;
            }, 750);
        }
    };
    xmlhttp.open("GET","inc/add-employee.php",true);
    xmlhttp.send();
}

function editEmployee(empId)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loader").style.display = 'block';
            const element = document.getElementById("readEmployee");
            element.remove();
            setTimeout(() => {
                document.getElementById("loader").style.display = 'none';
                document.getElementById("main").innerHTML = this.responseText;
            }, 750);
        }
    };
    xmlhttp.open("GET","inc/edit-employee.php?id="+empId,true);
    xmlhttp.send();
}

function viewEmployee(empId)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loader").style.display = 'block';
            const element = document.getElementById("readEmployee");
            element.remove();
            setTimeout(() => {
                document.getElementById("loader").style.display = 'none';
                document.getElementById("main").innerHTML = this.responseText;
            }, 750);
        }
    };
    xmlhttp.open("GET","inc/view-employee.php?id="+empId,true);
    xmlhttp.send();
}

function backToHome()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","inc/read-employee.php",true);
    xmlhttp.send();
}

function insertEmpData()
{
    var form_element = document.getElementsByClassName("form_data");

    var form_data = new FormData();

    for(var count = 0; count < form_element.length; count++)
    {
        form_data.append(form_element[count].name, form_element[count].value);
    }

    document.getElementById("submit").disabled = true;

    var ajax_request = new XMLHttpRequest();

    ajax_request.open("POST", "inc/add-employee.php", true);
    ajax_request.send(form_data);

    ajax_request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
        document.getElementById("loader").style.display = 'block';
        const element = document.getElementById("addEmployee");
        element.remove();
        
        document.getElementById("loader").style.display = 'none';
        document.getElementById("main").innerHTML = this.responseText;
        }
    }
}

function updateEmpData()
{
    var form_element = document.getElementsByClassName("form_data");

    var form_data = new FormData();

    for(var count = 0; count < form_element.length; count++)
    {
        form_data.append(form_element[count].name, form_element[count].value);
    }

    document.getElementById("submit").disabled = true;

    var ajax_request = new XMLHttpRequest();

    ajax_request.open("POST", "inc/edit-employee.php", true);
    ajax_request.send(form_data);

    ajax_request.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            document.getElementById("loader").style.display = 'block';
            const element = document.getElementById("editEmployee");
            element.remove();

            document.getElementById("loader").style.display = 'none';
            document.getElementById("main").innerHTML = this.responseText;
        }
    }
}

function setDeleteId(empBtn)
{
    let empId = empBtn.value;
    let empHiddenlId = document.getElementById("empId");
    
    let newEmpModalId = empId;
    empHiddenlId.value = newEmpModalId;
}

function deleteEmpData(empId)
{
    $(document).ready(function(){
        $('.btn-close').click();
    });
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("loader").style.display = 'block';
            const element = document.getElementById("readEmployee");
            element.remove();
            setTimeout(() => {
                document.getElementById("loader").style.display = 'none';
                document.getElementById("main").innerHTML = this.responseText;
            }, 750);
        }
    };
    xmlhttp.open("GET","inc/read-employee.php?id="+empId,true);
    xmlhttp.send();
}