@extends('layout')
  @section('header') <h3>SHOW EMPLOYEE DETAILS</h3> @endsection
  @section('body')
  
  @endsection
  @section('js')
  <script>
    window.addEventListener("load", (e) => {
      e.preventDefault();
      let mainCard = document.getElementById('maincard');
      let cardBody = document.getElementById('cardBody');
      mainCard.style.background = "#e1f1f1";
      cardBody.style.padding = "10px";

      let req = new XMLHttpRequest();

      req.open("GET", "{{ url('employee_details') }}", true)
      req.send();

      req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
          var emp_DbData = JSON.parse(req.responseText);
          var db_DataLength = emp_DbData.data.length;
          
          var rowsNo = parseInt(db_DataLength)/5;
          var calculate_rowNo = db_DataLength%5;
          let NoOfrow;

          if(calculate_rowNo == 0){
            NoOfrow = rowsNo;
          }else{
            NoOfrow = rowsNo + 1;
          }

          let rec = 0
          let count = 1
          for(let row1 = 1; row1 <= NoOfrow; row1++){
            for(let col1 = 1; col1 <= 4; col1++){
              
              let outerDiv = document.createElement('div');               
              outerDiv.className = "card float-left";
              outerDiv.style.width = "23%";
              outerDiv.style.margin = "10px";
              // outerDiv.style.boxShadow = "10px 20px 30px rgba(0,0,0,0.5)"
              outerDiv.style.boxShadow = "10px 20px 30px gray";

              while(rec < db_DataLength){
                let innerDivHeader = document.createElement('div');
                let innerDivBody = document.createElement('div');


                innerDivHeader.className = "card-header";
                innerDivBody.className = "card-body";

                let myTable = document.createElement('table');
                myTable.className = "table table-bordered";
                let imgTag = document.createElement("img");

                let nameSpan = document.createElement("span");
                
                // nameSpan.style.fontSize = "20px";
                nameSpan.style.fontWeight = "bold";

                imgTag.src = '{{ url("assest/images") }}' + '/' + emp_DbData['data'][rec]['emp_image'];
                imgTag.className = "dnamicImg img-thumbnail float-right";
                imgTag.id = "dnamicImg";
                imgTag.style.width = "50px";
                imgTag.style.height = "50px";
                imgTag.style.boxShadow ="5px 7px 10px rgba(0,0,0,0.5)"; 

                let empCity = emp_DbData['data'][rec]['emp_city'];
                let empContact = emp_DbData['data'][rec]['emp_contact'];
                let empRoll = emp_DbData['data'][rec]['emp_roll'];
                
                let thDataArray = ["City Name:", "Contact:", "Roll:"];
                let tdDataArray = [empCity, empContact, empRoll];

                let dataArrayLength = tdDataArray.length;
                for(let tab = 0; tab < dataArrayLength; tab++){
                  let tableTr = document.createElement('tr');
                  let tableTh = document.createElement('th');
                  let tableTd = document.createElement('td');
                  
                  tableTh.textContent = thDataArray[tab];
                  tableTd.textContent = tdDataArray[tab];

                  tableTr.appendChild(tableTh);
                  tableTr.appendChild(tableTd);
                  myTable.appendChild(tableTr);
                }
                nameSpan.innerHTML = emp_DbData['data'][rec]['emp_name'];;
                innerDivHeader.appendChild(nameSpan);
                innerDivHeader.appendChild(imgTag);
                innerDivBody.appendChild(myTable);

                outerDiv.appendChild(innerDivHeader);
                outerDiv.appendChild(innerDivBody);

                rec++;
                break;
              }   
                cardBody.appendChild(outerDiv);
                if(count == db_DataLength){
                  break;
                }              
                count++; 
            }                     
          }          
        }
      }
    });

    // let count = 0;
          // for(let row1 = 1; row1 <= NoOfrow; row1++){
          //   for(let col1 = 1; col1 <= 5; col1++){
          //     

          

          //                    

          //     
          //     // 

          //     // for(let rec = 0; rec < db_DataLength; rec++){      
                 //                   


          //     //   
                
          //     //   

          //     //  
          //     //   innerDivHeader.appendChild(imgTag);

         
          //     cardBody.append(outerDiv);
          //   }
          // }
  </script>
  @endsection