

//idk what to name it
function fetch_cell() {
    for (let i = 0; i < 108; i++) {
        console.log(document.getElementById("schedule-row-"+i));
    }
}


function build_table() {
    for (let i = 0; i < 108; i++) {
        let j = 0;
        let colu = 0;
        let table = document.getElementById("demo");
    
        let row = table.insertRow(1+i);
        row.setAttribute("id","schedule-row-"+i);
        row.setAttribute("style","height: 5px;");
        row.setAttribute("colspan","4");
    
        let time = row.insertCell(0);
        time.setAttribute("colspan","2");
        
        for (let j = 0; j < 5; j++) {
            let cell = row.insertCell(j+1);
            //cell.setAttribute("id","spec");
            cell.setAttribute("colspan","4");
        }
    }
}

build_table();