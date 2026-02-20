import { deleteData, getData, getSingleData, postData, putData } from "../../plugins/api";

// 🔹 Récupérer tous les speakers
export async function allSpeakers() {
  return await getData('/allspeaker').then(res => {
    return res.data.data ?? res.data;
  });
}

// 🔹 Récupérer un speaker par ID
export async function singleSpeaker(id) {
  return await getSingleData('/showspeaker/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

// 🔹 Ajouter un speaker
export async function postSpeaker(data) {
  return await postData('/addspeaker', data).then(res => {
    return res.data.data ?? res.data;
  });
}

// 🔹 Mettre à jour un speaker
export async function updateSpeaker(id, data) {
  return await putData('/updatespeaker/' + id, data).then(res => {
    return res.data.data ?? res.data;
  });
}

// 🔹 Supprimer un speaker
export async function deleteSpeaker(id) {
  return await deleteData('/deletespeaker/' + id).then(res => {
    return res.data;
  });
}