function abc(product_id)
{
    console.log('http://127.0.0.1:8000/test/' + product_id);
    fetch('http://127.0.0.1:8000/test/' + product_id)
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.log(error);
        })
}
//console.log('abc');