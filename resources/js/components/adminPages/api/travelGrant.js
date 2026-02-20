import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/**
 * 🔹 Récupérer toutes les demandes de Travel Grant
 */
export async function allTravelGrants() {
  return await getData('/alltravel').then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Récupérer une demande de Travel Grant par ID
 */
export async function singleTravelGrant(id) {
  return await getSingleData('/showtravel/' + id).then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Récupérer les demandes par statut
 * status : pending | approved | rejected (selon backend)
 */
export async function travelGrantsByStatus(status) {
  return await getData('/showbystatus/' + status).then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Ajouter une demande de Travel Grant
 */
export async function postTravelGrant(data) {
  return await postData('/addtravel', data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Mettre à jour une demande de Travel Grant
 */
export async function updateTravelGrant(id, data) {
  return await putData('/updatetravel/' + id, data).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Accepter une demande de Travel Grant
 */
export async function acceptTravelGrant(id) {
  return await putData('/accepttravel/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Rejeter une demande de Travel Grant
 */
export async function rejectTravelGrant(id) {
  return await putData('/rejecttravel/' + id).then(res => {
    return res.data.data ?? res.data;
  });
}

/**
 * 🔹 Supprimer une demande de Travel Grant
 */
export async function deleteTravelGrant(id) {
  return await deleteData('/deletetravel/' + id).then(res => {
    return res.data.data;
  });
}

/**
 * 🔹 Supprimer un document spécifique d'une demande
 * documentIndex = index du document (backend)
 */
export async function deleteTravelGrantDocument(id, documentIndex) {
  return await deleteData(`/travel-grants/${id}/documents/${documentIndex}`)
    .then(res => {
      return res.data.data ?? res.data;
    });
}