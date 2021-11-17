
window.onload = function() {

    let input = document.getElementById("input_search");
    // let output = document.getElementById("output");
    let timeout = null;
    
    input.onkeyup = function() {
        let input_value = input.value;
        console.log(input_value);
        
        clearTimeout(timeout);

        timeout = setTimeout(function() {
            // output.innerHTML = "";

            const API = "subscribers.php";
            const data = {data_input: input_value};
            const header = {

                'Content-Type': 'application/json'
            };

            fetch(API, {
                method: "POST",
                body: JSON.stringify(data),
                header:header
            }).then(function(response) {
                return response.json();
            // }).then(function(text) {
            //     output.innerHTML = text;
            }).catch(function(error) {
                console.error(error);
            });
        }, 400);
    }
}