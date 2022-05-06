


let form = document.querySelector('form');
let button = document.querySelector('input[type="submit"]');



const HandleAPI = () => {

    let inputs = document.querySelectorAll('input');
    
    let date = new Date();
    let nowDate = date.toLocaleDateString();

    let hall = inputs[0].value;
    let start = inputs[1].value;
    let end = inputs[2].value;
    let book_date = inputs[3].value;

    if (start > end || start.split(":")[0] <= 9 || end.split(":")[0] >= 22 ){
        Swal.fire(
            'تأكد من مواعيد الحجز',
            'مواعيد عملنا من 10ص حتى 10م',
            'error'
        );
    } else {
        
        let obj = {

            hall: hall,
            st: start,
            ed: end,
            book_dat: book_date,
            modified: nowDate,

        }

        let headReq  = new Headers();
        headReq.append("Auth", "beedo");
        headReq.set("Content-Type", "Application/json");

        fetch("https://vipcenter2022.000webhostapp.com/Afaq/AfaqApi.php", {
            method: 'POST',
            body: JSON.stringify(obj),
            headers: headReq
        })
            .then(response => response.json())
            .then(res => {
                if (res.status == 1) {
                    console.log(res);
                    Swal.fire(
                        'تهانينا',
                        'تم حجز القاعة بنجاح',
                        'success'
                    );
                } else {
                    console.log(res);
                    Swal.fire(
                        'عذراً',
                        `${res.mssg}`,
                        'error'
                    );

                }
            })
            .catch((err) => {
                Swal.fire(
                    'عذراً',
                    'يوجد خطأ بقواعد البيانات',
                    'error'
                );
                console.log(err);
            });
    }


};




button.addEventListener("click",()=>{
    HandleAPI();
});


document.addEventListener("keyup",(e)=>{
    if(e.key == "Enter"){
        button.click();
    }
});

let Qasatol = 20,
    DesignTol = 140000.5;

    let calc = Qasatol / DesignTol;

console.log(Math.ceil(DesignTol).toLocaleString("en-US"));

