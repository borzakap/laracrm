<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactPhoneRequest;
use App\Http\Requests\StoreContactEmailRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Requests\StoreContactRequest;
use App\Http\Resources\ContactListCollection;
use App\Http\Resources\ContactGetResource;
use App\Http\Resources\PhoneCollection;
use App\Http\Resources\EmailCollection;
use App\Http\Filters\ContactFilter;
use App\Events\PhoneProcessed;
use App\Events\EmailProcessed;
use App\Models\Contact;
use App\Models\Phone;
use App\Models\Email;

/**
 * @OA\Tag(
 *      name="Contacts",
 *      description="Operations with Contacts",
 * )
 */
class ContactController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/contacts/list",
     *      summary="List of contacts",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="page", 
     *          in="query",
     *          required=false, 
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#components/schemas/ContactFilter")
     *          )
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          ref="#/components/responses/ContactListCollection"
     *      )
     * )
     */
    public function list(ContactFilter $filter)
    {
        $res = Contact::with('phone', 'email')
                        ->filter($filter)->paginate($filter->perPage);
        return new ContactListCollection($res);
    }

    public function search()
    {
        //
    }
    

    /**
     * @OA\Post(
     *      path="/api/contacts/store",
     *      summary="Create contact",
     *      tags={"Contacts"},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#components/schemas/StoreContactRequest")
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK"
     *      )
     * )
     */
    public function store(StoreContactRequest $request)
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/api/contacts/{contactId}",
     *      summary="Get contact by Id",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="contactId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/ContactGetResource"
     *      ),
     * )
     */
    public function get(Contact $contact)
    {
        $contact->load('phones', 'emails');
        return new ContactGetResource($contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/api/contacts/{contactId}/phones/{phoneId}",
     *      summary="Update contact`s phone",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="contactId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="phoneId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#components/schemas/StoreContactPhoneRequest")
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/PhoneCollection"
     *      ),
     * )
     */
    public function updatePhone(StoreContactPhoneRequest $request, Contact $contact, Phone $phone)
    {
        $phone->fill($request->post())->save();
        PhoneProcessed::dispatch($contact, $phone);
        $contact->load('phones');
        return new PhoneCollection($contact->phones);
    }

    /**
     * @OA\Post(
     *      path="/api/contacts/{contactId}/phones",
     *      summary="Create contact`s phone",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="contactId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#components/schemas/StoreContactPhoneRequest")
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/PhoneCollection"
     *      ),
     * )
     */
    public function createPhone(StoreContactPhoneRequest $request, Contact $contact)
    {
        $phone = $contact->phones()->create($request->post());
        PhoneProcessed::dispatch($contact, $phone);
        $contact->load('phones');
        return new PhoneCollection($contact->phones);
    }

    /**
     * @OA\Delete(
     *      path="/api/contacts/{contactId}/phones/{phoneId}",
     *      summary="Delete contact`s phone",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="contactId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="phoneId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/PhoneCollection"
     *      ),
     * )
     */
    public function destroyPhone(Contact $contact, Phone $phone)
    {
        $phone->delete();
        PhoneProcessed::dispatch($contact, $phone);
        $contact->load('phones');
        return new PhoneCollection($contact->phones);
    }
    
    /**
     * @OA\Put(
     *      path="/api/contacts/{contactId}/emails/{emailId}",
     *      summary="Update contact`s email",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="contactId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="emailId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#components/schemas/StoreContactEmailRequest")
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/EmailCollection"
     *      ),
     * )
     */
    public function updateEmail(StoreContactEmailRequest $request, Contact $contact, Email $email)
    {
        $email->fill($request->post())->save();
        EmailProcessed::dispatch($contact, $email);
        $contact->load('emails');
        return new EmailCollection($contact->emails);
    }
    
    /**
     * @OA\Post(
     *      path="/api/contacts/{contactId}/emails",
     *      summary="Create contact`s email",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="contactId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#components/schemas/StoreContactEmailRequest")
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/EmailCollection"
     *      ),
     * )
     */
    public function createEmail(StoreContactEmailRequest $request, Contact $contact)
    {
        $email = $contact->emails()->create($request->post());
        EmailProcessed::dispatch($contact, $email);
        $contact->load('emails');
        return new EmailCollection($contact->emails);
    }

    /**
     * @OA\Delete(
     *      path="/api/contacts/{contactId}/emails/{emailId}",
     *      summary="Delete contact`s email",
     *      tags={"Contacts"},
     *      @OA\Parameter(
     *          name="contactId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="emailId",
     *          in="path",
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="OK",
     *          ref="#/components/responses/EmailCollection"
     *      ),
     * )
     */
    public function destroyEmail(Contact $contact, Email $email)
    {
        $email->delete();
        EmailProcessed::dispatch($contact, $email);
        $contact->load('emails');
        return new EmailCollection($contact->emails);
    }
}
