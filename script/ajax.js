            var findData = 'http://localhost:3000/script/insert.php';
            let conteneur = document.querySelector('#content');


            fetch(findData)
                .then(Response => Response.json())
                .then ((data) => {
                    data.forEach(item =>  {
                        conteneur.insertAdjacentHTML('beforeend', `<span> ${item.user} </span>`)
                    })
                    console.log(data);
                });