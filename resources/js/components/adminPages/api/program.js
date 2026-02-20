import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

// 🔹 Récupérer tous les programmes
export async function allPrograms() {
  return await getData('/allprogram').then(res => {
    return res.data.data;
  });
}

// 🔹 Récupérer un programme par ID
export async function singleProgram(id) {
  return await getSingleData('/showprogram/' + id).then(res => {
    return res.data.data;
  });
}

// 🔹 Récupérer les programmes par date
export async function programsByDate(date) {
  return await getData('/programbydate/' + date).then(res => {
    return res.data.data;
  });
}

// 🔹 Ajouter un programme
export async function postProgram(data) {
  return await postData('/addprogram', data).then(res => {
    return res.data.data ?? res.data;
  });
}

// 🔹 Mettre à jour un programme
export async function updateProgram(id, data) {
  return await postData('/updateprogram/' + id, data).then(res => {
    return res.data.data ?? res.data;
  });
}

// 🔹 Publier / Dépublier un programme
export async function togglePublishProgram(id) {
  return await putData('/publishprogram/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

// 🔹 Supprimer un programme
export async function deleteProgram(id) {
  return await deleteData('/deleteprogram/' + id).then(res => {
    return res.data.data;
  });
}
