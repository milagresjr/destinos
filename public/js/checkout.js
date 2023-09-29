
const changePaymentMethod = () => {

    const mcx = document.querySelector("#mcxMethod");
    const transf = document.querySelector("#transfMethod");

    const bodyTrans = document.querySelector("#bodyTrans");
    const bodyMcx = document.querySelector("#bodyMcx");

    const formPag = document.querySelector("#form-pag");
    const btnComprar = document.querySelector("#btnComprar")

    bodyMcx.style.display = 'none';

    mcx.addEventListener('click', () => {
        
        if(transf.classList.contains('active')) {
            transf.classList.remove('active');
            mcx.classList.add('active');
            bodyMcx.style.display = 'block';
            bodyTrans.style.display = 'none';
        }

        formPag.value = "mcx";
        btnComprar.classList.add('disabled');
        btnComprar.disabled = true;

    });

    transf.addEventListener('click', () => {
        
        if(mcx.classList.contains('active')) {
            mcx.classList.remove('active');
            transf.classList.add('active');
            bodyMcx.style.display = 'none';
            bodyTrans.style.display = 'block';
        } 

        formPag.value = "transferencia";
        btnComprar.classList.remove('disabled');
        btnComprar.disabled = false;

    });

}

changePaymentMethod();