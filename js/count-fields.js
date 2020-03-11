   //////// Count Rows JS ////////
    var rows = document.getElementByClassName("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
    console.log(rows);
    document.getElementById("rows-count").innerHTML = rows;