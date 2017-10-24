/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*global allUsers*/


// function for display results button on html
function displayResults() {

    document.write("All survey results are displayed below: </br>");

    for (var userId = 0; userId < allUsers.length; userId++) {
        var res = JSON.parse(localStorage.getItem(allUsers[userId]));
        document.write("The survey result for username " + allUsers[userId] + " is: </br>");

        for (numQue in res) {
            for (property in res[numQue]) {
                document.write(res[numQue][property] + "</br>");
            }
        }
        document.write("</br>");
    }

}
;