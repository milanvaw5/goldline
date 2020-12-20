import { runInThisContext } from "vm";

class Commission {
  constructor(commission) {
    this.name = commission['name'];
    this.surname = commission['surname'];
    this.phone = commission['phone'];
    this.mail = commission['mail'];
    this.project = commission['project'];
    this.description = commission['description'];
    this.ID = commission['commissionID'];
    this.deadline = this.sqlToJsDate(commission['deadline']);
    this.today = new Date() - 3600000;
    this.dateDifference = (this.createDateDifference());
  }

  sqlToJsDate(sqlDate) {
    const sqlDateArr1 = sqlDate.split('-');
    const sYear = sqlDateArr1[0];
    const sMonth = (Number(sqlDateArr1[1]) - 1).toString();
    const sqlDateArr2 = sqlDateArr1[2].split(' ');
    const sDay = sqlDateArr2[0];
    const sqlDateArr3 = sqlDateArr2[1].split(':');
    const sHour = sqlDateArr3[0];
    const sMinute = sqlDateArr3[1];
    const sqlDateArr4 = sqlDateArr3[2].split('.');
    const sSecond = sqlDateArr4[0];
    return new Date(sYear, sMonth, sDay, sHour, sMinute, sSecond);
  }

  createDateDifference() {
    const ms = Math.abs(this.today - this.deadline);
    let day, hour, minute, seconds;
    seconds = Math.floor(ms / 1000);
    minute = Math.floor(seconds / 60);
    seconds = seconds % 60;
    hour = Math.floor(minute / 60);
    minute = minute % 60;
    day = Math.floor(hour / 24);
    hour = hour % 24;
    return ({
      day:   day,
      hour:   hour,
      minute:   minute,
      seconds:   seconds
    });
  }

  createCountdownElement () {

    let prefix = '';
    if(this.today > this.deadline.getTime()) prefix = '- ';
    let $element = '';

    if(this.description.length > 255) this.description = (this.description).substring(0, 255);
    if(this.dateDifference.day > 3)
    {
      $element = `
      <li class="commission__cards__item__remaining--item">${prefix}<span class="days">${this.dateDifference.day}</span> Days</li>
      <li class="commission__cards__item__remaining--item">${prefix}<span class="hours">${this.dateDifference.hour}</span> Hours</li>
      <li class="commission__cards__item__remaining--item">${prefix}<span class="minutes">${this.dateDifference.minute}</span> Minutes</li>
      <li class="commission__cards__item__remaining--item hidden">${prefix}<span class="seconds">${this.dateDifference.seconds}</span> Seconds</li>
      `;
    } else {
      $element = `
      <li class="commission__cards__item__remaining--item">${prefix}<span class="hours">${this.dateDifference.hour}</span> Hours</li>
      <li class="commission__cards__item__remaining--item">${prefix}<span class="minutes">${this.dateDifference.minute}</span> Minutes</li>
      <li class="commission__cards__item__remaining--item">${prefix}<span class="seconds">${this.dateDifference.seconds}</span> Seconds</li>`;
    }
    return $element;
  }

  createHTML() {
    let clas = '';
    if(this.today > this.deadline) clas = 'red';
    let day, month = '';

    if(((this.deadline).getDate().toString()).length === 1)day = `0${(this.deadline).getDate()}`;
    else day = `${(this.deadline).getDate()}`;
    if(((this.deadline).getMonth().toString()).length === 1)month = `0${(this.deadline).getMonth() + 1}`;
    else month = `${(this.deadline).getMonth() + 1}`;


    return `
        <article class="commission__cards--item ${clas}">
          <div class="commission__cards--wrapper">
            <h2 class="hidden">Projectdisplay</h2>
              <form class="commission__cards__item__form" action="index.php?page=home" method="POST">
                <input class="commission__cards__item__form--ID hidden" value="${this.ID}" name="ID">
                <input class="commission__cards__item__form--checkmark" type="image" width="35" height="35" value="submit" src="./assets/check.svg" alt="submit Button">
              </form>
            <div class="commission__cards__item--wrapper">
              <p class="commission__cards__item--title bold">${this.project}</p>
              <p class="commission__cards__item--client medium">${this.surname + ' ' + this.name}</p>
              <ul class="commission__cards__item--contactList">
                <li class="commission__cards__item__contactList--item"><a href="tel:${this.phone}" class="commission__cards__item__contactList--link commission__cards__item__contactList--call">Call</a></li>
                <li class="commission__cards__item__contactList--item"><a href="mailto:${this.mail}?Subject=Project%20${(this.project).replace(' ', '%20')}" class="commission__cards__item__contactList--link commission__cards__item__contactList--mail">Send mail</a></li>
              </ul>
            </div>
            <p class="commission__cards__item--description">${this.description} <br> <a href="index.php?page=detail&id=${this.ID}" class="commission__cards__item--description--details has-js">Read more details...</a></p>
            <div class="commission__cards__item--dates">
                <ul class="commission__cards__item__dateList">
                  <li class="commission__cards__item__dateList--item commission__cards__item__dateList--day">${day}</li>
                  <li class="commission__cards__item__dateList--item commission__cards__item__dateList--month commission__cards__item__dateList--smalldate">${month}</li>
                  <li class="commission__cards__item__dateList--item commission__cards__item__dateList--year commission__cards__item__dateList--smalldate">${(this.deadline).getFullYear().toString().substr(- 2)}</li>
                </ul>
                <ul class="commission__cards__item__remaining">
                ${this.createCountdownElement()}
              </ul>
            </div>
          </div>
        </article>

      `;
  }
}
export default Commission;
