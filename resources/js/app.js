import './bootstrap';

let nav = 0;
let clicked = null;
let events = [];
let location = document.location.pathname
const userName = location === '/cabinet'?document.getElementById('user').innerHTML: null;
let newEvent = {};
const mapLink = document.querySelector('#map');
const mapContainer = document.querySelector('.footer-map');
const mapCloser = document.querySelector('.footer-map-close');
const dropDown = document.querySelectorAll('.drop-menu');
const dropDownMenu = document.querySelector('.projects');
const DocsMenu = document.querySelector('.documents');
const _token = document.querySelector('meta[name="csrf-token"]');
const calendar = document.getElementById('calendar');
const newEventModal = document.getElementById('newEventModal');
const deleteEventModal = document.getElementById('deleteEventModal');
const backDrop = document.getElementById('modalBackDrop');
const eventTitleInput = document.getElementById('eventTitleInput');
let eventsList = document.getElementsByClassName('events-list')[0];
const weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
const monthArray = ['січня', 'лютого', 'березня', 'квітня', 'травня', 'червня', 'липня', 'серпня', 'вересня', 'жовтня', 'листопада', 'грудня']

window.onload=()=>{
  if(location === '/'){
    initButtons();
    getData(null)
    .then((res) => {
      //console.log(res)
      const dt = new Date().toLocaleString();
      let loadingEvents = []
      for (let i = 0; i < res.length; i++) {    
        let data = { 'date': res[i].date, 'title': res[i].title, 'id': res[i].id }
        loadingEvents.push(data)
      }
      if (events.length === 0) {
        events = [...loadingEvents]
        localStorage.setItem('events', JSON.stringify(events));
      }
      let list = events.filter((item) => item.date.substring(5, 7) == dt.substring(3, 5))
      return renderEvents(nav,list);
    }).then(()=>load(nav));
  }
  if(location === '/cabinet'){
    getData(userName)
    .then((res) => {
      //console.log(res)
      const dt = new Date().toLocaleString();
      let loadingEvents = []
      for (let i = 0; i < res.length; i++) {    
        let data = { 'date': res[i].date, 'title': res[i].title, 'id': res[i].id }
        loadingEvents.push(data)
      }
      if (events.length === 0) {
        events = [...loadingEvents]
        localStorage.setItem('events', JSON.stringify(events));
      }
     let list = events.filter((item) => item.date.substring(5, 7) == dt.substring(3, 5))
      return renderEvents(nav,list);
    }).then(()=>load(nav))  
    initButtons();
  }
}

function openModal(date) {
  clicked = date;

  const eventForDay = events.find(e => e.date === clicked);

  if (eventForDay) {
    //console.log(eventForDay,clicked.substring(8, 10));
    let deleteDateMonth = document.getElementsByClassName('deleteDateMonth')[0]
    let deleteDateDay = document.getElementsByClassName('deleteDateDay')[0]
    deleteDateMonth.innerHTML = monthArray[clicked.substring(5, 7)-1]
    deleteDateDay.innerHTML = clicked.substring(8,10)
    document.getElementById('eventText').innerText = eventForDay.title;
    deleteEventModal.style.display = 'block';
  } else {
    newEventModal.style.display = 'block';
    newEvent.date = clicked;
  }
  backDrop.style.display = 'block';
}

mapLink.addEventListener('click', ()=>{
  mapContainer.style.display = 'flex'
})

mapCloser.addEventListener('click', ()=>{
  mapContainer.style.display = 'none'
})

window.addEventListener('click',(e)=>{
  let target = e.target;
    if(target==dropDown[0] || target==dropDown[0].firstChild){
      DocsMenu.style.display = 'block'
    }
    if(target===dropDown[1] || target===dropDown[1].firstChild){
      dropDownMenu.style.display = 'block'
    }
    else if(target!==dropDown[1] || target!==dropDown[1].firstChild){
      dropDownMenu.style.display = 'none'
    } 
     if(target!==dropDown[0].firstChild){
      DocsMenu.style.display = 'none'
    }
})

function load(nav) {
  const dt = new Date();
  if (nav !== 0) {
    dt.setMonth(new Date().getMonth() + nav);
  }
  const day = dt.getDate();
  const month = dt.getMonth();
  const year = dt.getFullYear();
  const firstDayOfMonth = new Date(year, month, 1);
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
    weekday: 'long',
    year: 'numeric',
    month: 'numeric',
    day: 'numeric',
  });
  const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);
  //console.log(events);
  renderEvents(nav,events);

  document.getElementById('monthDisplay').innerText =
    `${dt.toLocaleDateString('uk-UA', { month: 'long' })} ${year}`;

  calendar.innerHTML = '';

  for (let i = 1; i <= paddingDays + daysInMonth; i++) {
    const daySquare = document.createElement('div');
    daySquare.classList.add('day');

    const dayString = i - paddingDays > 9 ? `${year}-0${month + 1}-${i - paddingDays}` : `${year}-0${month + 1}-0${i - paddingDays}`;
    const eventForDay = events.find(e => e.date === dayString);
    if (i > paddingDays) {
      daySquare.innerText = i - paddingDays;
      
      //console.log(i - paddingDays,paddingDays);
      if (i - paddingDays === day && nav === 0) {
        daySquare.id = 'currentDay';
      }

      if (eventForDay) {
        const eventDiv = document.createElement('div');
        eventDiv.classList.add('event');
        // eventDiv.innerText = eventForDay.title;
        daySquare.appendChild(eventDiv);
      }

      daySquare.addEventListener('click', () => openModal(dayString));
    } else {
      daySquare.classList.add('indent');
    }

    calendar.appendChild(daySquare);
  }

  function handleUpload (e){
    let target = e.target;
    console.log('target:', target);
    if(target.tagName==='INPUT'){
    const file = target.files[0];
    const formData = new FormData();
    let eventId = target.getAttribute('data-id');
    console.log('event id:', eventId);
    console.log('target:', target);
    console.log('file:', file);
    formData.append('file', file);
    let url = location==='/cabinet'? eventId? `/documents/examples/upload?event_id=${eventId}`: `/documents/examples/upload?event_id=0&user_id=${userName}` : `/documents/examples/upload?event_id=${eventId}`;
    fetch(url, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': _token.getAttribute('content'),
        'X-Requested-With': 'XMLHttpRequest',
      },
      body: formData
    })
    .then(response => {
      return response.text(); // extract the response body as text
    })
    .then(text => {
      text = JSON.parse(decodeURIComponent(text))
      let container = document.querySelector('.task-materials');
      let child = document.createElement('div')
      child.innerHTML = text.path
      console.log(text,typeof text);
      container.appendChild(child)

    })
    .catch(error => {
      console.error(error);
    });
  }
  }

  eventsList.addEventListener('change', handleUpload); 
  if(location==='/cabinet'){
    document.querySelector('#nEventDoc').addEventListener('change',handleUpload)
  }

}

function closeModal() {
  eventTitleInput.classList.remove('error');
  newEventModal.style.display = 'none';
  deleteEventModal.style.display = 'none';
  backDrop.style.display = 'none';
  eventTitleInput.value = '';
  clicked = null;
  load(nav);
  renderEvents(nav,events);
}

function saveEvent() {
  if (eventTitleInput.value) {
    eventTitleInput.classList.remove('error');

    events.push({
      date: clicked,
      title: eventTitleInput.value,
    });
    let dataForPosting;
    if(location !=='/'){
      dataForPosting = JSON.stringify({ ...newEvent, 'title': eventTitleInput.value, 'user': userName });
    }
    else {
      dataForPosting = JSON.stringify({ ...newEvent, 'title': eventTitleInput.value });
    }

    //console.log(dataForPosting)
    localStorage.setItem('events',dataForPosting); 
    closeModal()
    renderEvents(nav,events)
    postData(dataForPosting,userName)
  } else {
    eventTitleInput.classList.add('error');
  }
}

 function deleteEvent() {

  let deletEdevent = events.filter(e => e.date == clicked);
  let _date = deletEdevent[0].date
  let url = location === '/'? `/events/${_date}`: `/events/${userName}/${_date}` ;
  console.log(_date,deletEdevent,url);
  fetch( url, {
    method: 'DELETE',
        headers: {
      "Content-Type": "application/json",
      'X-CSRF-TOKEN': _token.getAttribute('content'),
      "Accept": "application/json, text-plain, */*",
      "X-Requested-With": "XMLHttpRequest",
    },
  })
  events = events.filter(e => e.date !== clicked);
  
  localStorage.setItem('events', JSON.stringify(events));
  renderEvents(nav,events);
  closeModal();
}

function initButtons() {
  document.getElementById('nextButton').addEventListener('click', () => {
    nav++;
    load(nav);
    renderEvents(nav,events);
  });

  document.getElementById('backButton').addEventListener('click', () => {
    nav--;
    load(nav);
    renderEvents(nav,events)
  });

  document.getElementById('saveButton').addEventListener('click', saveEvent);
  document.getElementById('cancelButton').addEventListener('click', closeModal);
  document.getElementById('deleteButton').addEventListener('click', deleteEvent);
  document.getElementById('closeButton').addEventListener('click', closeModal);
}

async function getData(id) {
  let url = '';
  if(id){
    url = `/getevents/${id}`
  }
  else{
    url = '/getevents'
  }
 const response = await fetch(url)
  const result = await response.json()
  //console.log(result)
  return result;
}



async function postData(data,id) {
  //console.log(data,id);
  let url = '';
  if(id){
    url = `/postevents/${id}`
  }
  else {
    url = '/postevents'
  }
  await fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      'X-CSRF-TOKEN': _token.getAttribute('content'),
      "Accept": "application/json, text-plain, */*",
      "X-Requested-With": "XMLHttpRequest",
    },
    body: JSON.stringify(data)

  })
.then((res)=>{
  res.json()
})
.then(()=>{
  window.location.reload();
  return false;
})
}

async function getProjects() {
  const response = await fetch('/projects')
  const result = await response.json()
  return result;
}
getProjects().then((result)=>{
  //console.log(typeof result,result)
  for(let item of result[0]){
    const projectsLi = document.createElement('a');
    projectsLi.classList.add('projects-item');
    projectsLi.setAttribute('href',`/projects/${item}`)
    projectsLi.innerHTML = item;
    dropDownMenu.appendChild(projectsLi);
  }
  for(let item of result[1]){
    const projectsLi = document.createElement('a');
    projectsLi.classList.add('documents-item');
    projectsLi.setAttribute('href',`/documents/${item}`)
    projectsLi.innerHTML = item;
    DocsMenu.appendChild(projectsLi);
  }
})

function renderEvents(nav,events) {
  const docUpload = document.querySelector('.cabinet-document');
    //console.log(docUpload);
  const dt = new Date().toLocaleString();
  let monthLink = +dt.substring(3, 5) + nav > 9 ? (+dt.substring(3, 5) + nav).toString() : `0${(+dt.substring(3, 5) + nav).toString()}`;
  let arrevents = events.filter((item) => item.date.substring(5, 7) == monthLink)
  .sort((curr,next)=>{
    if(curr.date>next.date) return 1;
    if(curr.date<next.date) return -1;
    return 0
  });
  if (eventsList.hasChildNodes()) {
    let eventsParent = eventsList.parentNode;
    eventsParent.removeChild(eventsList)
    let element = document.createElement('div');
    element.classList.add('events-list');
    eventsList = element
    eventsParent.appendChild(eventsList)

    arrevents.forEach(item => {
      let month = item.date.split('-')[1];
      let day = item.date.split('-')[2];
      let reverseDate = dt.split('.')
      reverseDate[2] = reverseDate[2].substring(4,-1)

      if (arrevents.length > 0) {
        let clone = docUpload.cloneNode('true');
        clone.style.display = 'block';
        let eventContainer = document.createElement('div');
        let dateEvent = document.createElement('span');
        let monthEvent = document.createElement('span');
        let titleEvent = document.createElement('span');
        eventContainer.classList.add('date-container');
        dateEvent.classList.add('date')
        titleEvent.classList.add('title')
        monthEvent.classList.add('month')
        dateEvent.innerHTML = `${day}`;
        monthEvent.innerHTML = `${monthArray[month - 1]}`;
        titleEvent.innerHTML = item.title;
        eventsList.appendChild(eventContainer);
        eventContainer.appendChild(dateEvent);
        eventContainer.appendChild(monthEvent);
        eventContainer.appendChild(titleEvent);
        eventContainer.appendChild(clone);
        let inputs = clone.querySelectorAll('input');
        inputs.forEach(input => {
          console.log(input);
          input.setAttribute('data-id', item.id);
        }); 

        if(reverseDate.reverse().join('-')===item.date){
          eventContainer.style.fontWeight = 'bold'
          eventContainer.style.border = '1px solid var(--hilight)'
          eventContainer.style.borderRadius = '15px'
          eventContainer.style.padding = '10px'
        }
      }
     // console.log(reverseDate.reverse().join('-'),item.date);
    })
    if (arrevents.length == 0) {
      if(location==='/cabinet'){
        eventsList.classList.add('cabinet-content')
      }
      let titleEvent = document.createElement('div');
      titleEvent.classList.add('withoutEvents')
      titleEvent.innerHTML = 'В цьому місяці немає подій'
      eventsList.appendChild(titleEvent)
    }
  }
  else {
    arrevents.forEach(item => {
      let month = item.date.split('-')[1];
      let day = item.date.split('-')[2];
      let reverseDate = dt.split('.')
      if (arrevents.length > 0) {
        let eventContainer = document.createElement('div');
        let dateEvent = document.createElement('span');
        let monthEvent = document.createElement('span');
        let titleEvent = document.createElement('span');
        eventContainer.classList.add('date-container')
        dateEvent.classList.add('date')
        titleEvent.classList.add('title')
        monthEvent.classList.add('month')
        dateEvent.innerHTML = `${day}`;
        monthEvent.innerHTML = `${monthArray[month - 1]}`;
        titleEvent.innerHTML = item.title;
        eventsList.appendChild(eventContainer);
        eventContainer.appendChild(dateEvent);
        eventContainer.appendChild(monthEvent);
        eventContainer.appendChild(titleEvent);
        if(reverseDate.reverse().join('-')===item.date){
          eventContainer.style.fontWeight = 'bold'
        }
      }
      else {
        let titleEvent = document.createElement('div');
        titleEvent.classList.add('title')
        titleEvent.innerHTML = 'time without events'
        eventsList.appendChild(titleEvent)
      }
    })
  }
}

window.addEventListener('DOMContentLoaded',() => {
  if(location === '/'){
  let container = document.getElementsByClassName('birthdays')[0];
  let overload = document.getElementsByClassName('birthday');
  let birthdayMonth = document.getElementsByClassName('birthday-month');
  let birthdayDay = document.getElementsByClassName('birthday-day');
  let birthDayName =  document.getElementsByClassName('user');
  let newsDate = document.getElementsByClassName('news-date');

  let birthdaysArray = [];
  for (let i=0; i<birthdayMonth.length;i++){
    let printBirtdayMonth = birthdayMonth[i].innerHTML.split('-').slice(1, 2).join('')
    let printBirtdayDay = birthdayMonth[i].innerHTML.split('-').slice(2, 3).join('')
    let obj = {'month':printBirtdayMonth,'name':birthDayName[i].innerHTML, 'day':printBirtdayDay}
    birthdaysArray.push(obj)
  }
  birthdaysArray.sort((curr,next)=>{
    if(curr.month>next.month ) return 1;
    if( curr.month === next.month){
     return curr.day<next.day?  -1: 1;
    } 
    if(curr.month<next.month) return -1;
    return 0
  })
  //console.log(birthdaysArray);
  for (let i=0; i<birthdaysArray.length;i++){
    if(i<3){
      //console.log(birthDayName[i]);
      birthdayMonth[i].innerHTML = monthArray[birthdaysArray[i].month-1]
      birthdayDay[i].innerHTML = birthdaysArray[i].day
      birthDayName[i].innerHTML = birthdaysArray[i].name
    }
    if(i===3){
      for(let j = birthDayName.length; j>3; j--){
       // console.log(birthDayName[j]);
        container.removeChild(overload[j-1])
      } 
    }
  }
  for (let item of newsDate){
    let content = item.innerHTML;
    item.innerHTML = content.split('-').reverse().join('.')
  }
}
  getProjects();
})


