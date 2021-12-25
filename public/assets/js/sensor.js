const dataSuhu = []
const dataPh = [];
const labels=[1,2,3,4,5,6];


const displayPh = document.querySelector('.ph');
const displaySuhu = document.querySelector('.suhu');
const displayUmurIkan = document.querySelector('.umur-ikan');
const displayTime = document.querySelector('.time');
const displayResult = document.querySelector('.alert');

const suhu = document.getElementById('suhu').getContext('2d');
const ph = document.getElementById('ph').getContext('2d');

const idKolam = document.getElementById('app').dataset.id;
console.log(idKolam);



setInterval(() => {
  fetch(`/api/v1/sensor/${idKolam}`)
  .then((response) =>{
    return response.json()
   }
  ).then(result =>{
    displayPh.innerHTML = result.averagePh;
    displaySuhu.innerHTML = result.averageSuhu;
    displayUmurIkan.innerHTML = result.umurIkan;
    displayTime.innerHTML = result.created;
    displayResult.innerHTML = result.result;
    if(result.result=="Optimal"){
      displayResult.classList.remove("danger");
      displayResult.classList.add("success");
    }else{
     displayResult.classList.add("danger");
      displayResult.classList.remove("success");
    }

    const dataSuhu = result.suhu;
    const dataPh = result.ph;


    suhuChart.data.datasets.forEach((dataset) => {
       dataset.data=dataSuhu
   });
   suhuChart.update();

   phChart.data.datasets.forEach((dataset) => {
       dataset.data=dataPh
   });
   phChart.update();

  })
}, 1000);

 const suhuChart = new Chart(suhu, {
 type: 'line',
 data: {
     labels: labels,
     datasets: [{
         label: 'Data Suhu',
         data: dataSuhu,
         backgroundColor: [
             'rgba(255, 99, 132, 0.2)',
         ],
         borderColor: [
             'rgba(255, 99, 132, 1)',
         ],
         borderWidth: 2
     }]
 }
});

const phChart = new Chart(ph,{
type: 'line',
 data: {
     labels:labels,
     datasets: [{
         label: 'Data PH',
         data: dataPh,
         backgroundColor: [
             'rgba(255, 99, 132, 0.2)',
         ],
         borderColor: [
             'rgba(255, 99, 132, 1)',
         ],
         borderWidth: 2
     }]
 }
 })