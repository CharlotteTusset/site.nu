function generateContent(n) {
    const container = document.querySelector('.content-generator_js');

    for (let i = 0; i <= n; i++) {
        const p = document.createElement('p');
        container.appendChild(p);

        if (i % 3 === 0 && i % 5 === 0 && i % 7 === 0) {
            p.innerHTML += 'FOOBARBAZ';
        }
        else if (i % 3 === 0 && i % 5 === 0) {
            p.innerHTML += 'FOOBAR';
        }
        else if (i % 3 === 0 && i % 7 === 0) {
            p.innerHTML += 'FOOBAZ';
        }
        else if (i % 5 === 0 && i % 7 === 0) {
            p.innerHTML += 'BARBAZ';
        }
        else if (i % 3 === 0) {
            p.innerHTML += 'FOO';
        }
        else if (i % 5 === 0) {
            p.innerHTML += 'BAR';
        }
        else if (i % 7 === 0) {
            p.innerHTML += 'BAZ';
        } 
        else {
            p.innerHTML += i;
        }
    }
}
generateContent(300);


fetch('api/api-interview.json') 
    .then(resp => resp.json()) 
    .then(data => {
        let vacancies = data.data;
        vacancies.map(vacancy => {
            const block = document.querySelector('.vacancies');
            const div = document.createElement('div');
            div.className = 'vacancy';
            block.appendChild(div);

            const vacancy_title = document.createElement('h2');
            div.appendChild(vacancy_title);
            vacancy_title.innerHTML = vacancy.title;

            const vacancy_details = document.createElement('p');
            div.appendChild(vacancy_details);
            vacancy_details.className = 'vacancy__details';
            vacancy_details.innerHTML = vacancy.location + ' - ' + vacancy.type;
        })
    });
