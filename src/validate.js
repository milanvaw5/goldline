
  console.log('indeze file joh');
  const handleSubmitForm = e => {
    const $form = e.currentTarget;
    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);

      $form.querySelector(`.addform--errorMessage`).innerHTML = `Some errors occured`;
    }
    else {
      console.log(`Form is valid => submit form`);
    }
  };

  const showValidationInfo = $field => {
    let message;
    if ($field.validity.valueMissing) {
      message = `You must fill this in :)`;
    }
    if ($field.validity.typeMismatch) {
      message = `Oopsie, typo`;
    }
    if ($field.validity.rangeOverflow) {
      const max = $field.getAttribute(`max`);
      message = `It's a bit to big, max ${max}`;
    }
    if ($field.validity.rangeUnderflow) {
      const min = $field.getAttribute(`min`);
      message = `It's a bit to small, min ${min}`;
    }
    if ($field.validity.tooShort) {
      const min = $field.getAttribute(`minlength`);
      message = `It's a bit to short, minimum length is ${min}`;
    }
    if ($field.validity.tooLong) {
      const max = $field.getAttribute(`maxlength`);
      message = `It's a bit to long, maximum length is ${max}`;
    }
    if ($field.name === 'phone') {
      $field.setCustomValidity('This field requires only numbers');
      if (isNaN($field.value)) {
        message = `This field requires only numbers`;}
      else $field.setCustomValidity('');
    }
    if (message) {

      $field.parentElement.querySelector(`.addform--errorMessage`).textContent = message;
    }
  };

  const handeInputField = e => {
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      $field.parentElement.querySelector(`.addform--errorMessage`).textContent = ``;
      if ($field.form.checkValidity()) {
        $field.form.querySelector(`.addform--errorMessage`).innerHTML = ``;
      }
    }
  };

  const handeBlurField = e => {
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    fields.forEach($field => {
      $field.addEventListener(`input`, handeInputField);
      $field.addEventListener(`blur`, handeBlurField);
    });
  };

  const init = () => {
    const $form = document.querySelector(`.addform`);
    $form.noValidate = true;
    $form.addEventListener(`submit`, handleSubmitForm);

    const fields = $form.querySelectorAll(`.input`);
    addValidationListeners(fields);
  };

  init();
