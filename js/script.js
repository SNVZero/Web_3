for (  date = 1; date <= 30; date++) {
    let options = document.createElement("OPTION");
    document.getElementById("date").appendChild(options).innerHTML = date;
  }
for ( mounth = 1; mounth <= 12; mounth++) {
    let options = document.createElement("OPTION");
    document.getElementById("mounth").appendChild(options).innerHTML = mounth;
  }
for ( year = 1956; year <= 2021; year++) {
    let options = document.createElement("OPTION");
    document.getElementById("year").appendChild(options).innerHTML = year;
  }