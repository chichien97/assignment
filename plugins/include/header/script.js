// Navigation bar
function sideBar_show(){
  document.getElementById("side_nav").style.position = "absolute";
}
function sideBar_close(){

}
// function drpdown_nav(){
//   var dp_nav = document.getElementById('nav_bar_m');
//   if(dp_nav.style.display = "block"){
//     dp_nav.style.display = "none";
//   }
//   else if(dp_nav.style.display = "none"){
//     dp_nav.style.display = "block";
//   }
// }
// Navigation bar modal Box
function side_close(){
  document.getElementById('side_c_container').style.display = "none";
  document.getElementById('side_p_container').style.display = "none";
  document.getElementById('side_modal_container').style.display = "none";
}
function side_open_c(){
  document.getElementById('side_c_container').style.display = "block";
  document.getElementById('side_p_container').style.display = "none";
  document.getElementById('side_modal_container').style.display = "block";
}
function side_close_c(){
  document.getElementById('side_c_container').style.display = "none";
  document.getElementById('side_p_container').style.display = "none";
  document.getElementById('side_modal_container').style.display = "none";
}
function side_open_p(){
  document.getElementById('side_c_container').style.display = "none";
  document.getElementById('side_p_container').style.display = "block";
  document.getElementById('side_modal_container').style.display = "block";
}
function side_close_p(){
  document.getElementById('side_c_container').style.display = "none";
  document.getElementById('side_p_container').style.display = "none";
  document.getElementById('side_modal_container').style.display = "none";
}
