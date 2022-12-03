window.addEventListener("load", function(){
    
    let all_btn = document.querySelector(".all");
    let result = document.querySelector(".result");

    all_btn.addEventListener("click", function(event){
        event.preventDefault();

        let url = `dashboard.php?filter=All`;
        console.log(url);

        fetch(url)
        .then(function (response) {
            if (response.ok) {
            return response.text();
            } else {
            throw new Error(response.statusText);
            }
        })
        .then(function (data) {
            result.innerHTML = data;
        });
    })
})