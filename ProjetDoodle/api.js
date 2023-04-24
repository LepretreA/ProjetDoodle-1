function appelAPI(){


    var Case = RecupCases();
    let valeur = document.getElementById("Semaine").innerHTML;
    let data = {"Semaine":valeur,"case":Case};
    //const urlEncodedData = new URLSearchParams(data);
    console.log(data);
    console.log('Bite');
    console.log(valeur);
    console.log(Case);
    fetch('apipi.php', { method: 'POST', body:JSON.stringify(data), headers: {'Content-Type': 'application/x-www-form-urlencoded',} });
    
}//"Semaine=" + valeur + ", Case=" + Case 



// Pour récup les case on json_decode($data)
//on prend dedans $data['Case'] pour recup les case ensuite on utilise 
//une boucle pour lire toute les info dans le tableau et on s'en sert pour cocher les case du planner ne se reconnecteant