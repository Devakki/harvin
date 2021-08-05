@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Terms">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Green Places | Erase Your Company Footprint" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">
   
@endpush

@push('styles')
<style>
    .terms-page OL { counter-reset: item }
    .terms-page LI { display: block; margin-bottom: 15px; }
    .terms-page LI:before { content: counters(item, ".") " "; counter-increment: item }
</style>
@endpush

@section('content')
    <div class="greenplaces-main">
        <section class="greenp-blog-inner-page terms-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="greenp-blog-inner-details-section">
                            <h1 class="greenp-page-title-main">TERMS AND CONDITIONS</h1>
                            <p class="greenp-paragraph-text">
                                This Terms and Conditions agreement (the "Agreement") applies to each customer (the “Customer”) that accepts a proposal from GREEN PLACES, LLC. ("GREEN PLACES") and constitutes a binding contract between such Customer and GREEN PLACES. 
                            </p>
                            <ol>
                                <li>
                                    <b>Customer Responsibilities and Representations.</b>
                                    <ol>
                                        <li>
                                            Customer agrees to:
                                            <ol>
                                                <li>Use reasonable efforts to post at its physical location and in any web presence a statement that it is a “Green Place” in the form, and using the logos, provided by GREEN PLACES; and</li>
                                                <li>Follow any supplemental requirements with respect to the Licensed Marks of which GREEN PLACES informs it.</li>
                                            </ol>
                                        </li>
                                        <li>Customer hereby grants to GREEN PLACES the right to use its name and logo for GREEN PLACES’s marketing and promotional purposes.</li>
                                        <li>Customer represents and warrants to GREEN PLACES that all information supplied to GREEN PLACES, whether orally or in writing, is true and correct and accurately reflects the facts on which such information is based.</li>
                                        <li>Customer represents and warrants that the individual accepting the GREEN PLACES proposal is authorized to do so on behalf of the Customer.</li>
                                    </ol>
                                </li>
                                <li>
                                    <b>Trademark Authorization.</b>
                                    <p>GREEN PLACES hereby grants to Customer the following rights under the Licensed Marks.</p>
                                    <ol>
                                        <li>Usage. So long as Customer complies with all aspects of this Agreement, Customer is authorized to use the Licensed Marks in conjunction with Customer’s business. Such rights to use such Licensed Marks are nonexclusive, nontransferable, nonsublicensable, worldwide, and revocable if Customer fails to comply with all requirements in this Agreement. All depictions and use of the Licensed Marks by Customer shall comply with the Identity Guidelines and shall be exact electronic or print reproductions of depictions of the Licensed Marks described in such Identity Guidelines or shall be pre-approved in writing by GREEN PLACES before their use. If at any time Customer becomes aware that it is in breach of this Agreement, Customer agrees to terminate its use of the Licensed Marks, immediately upon its own discovery of, or upon notice of, the breach, until such breach is cured.</li>
                                        <li>Respect for GREEN PLACES's Marks, Logos, and Names. Customer shall not assert any ownership rights in any GREEN PLACES trademark, other mark, name, or logo by assuming, reserving, registering, using, or otherwise claiming any mark, logo, or name (including any Internet domain name) owned or already being used by GREEN PLACES (or that is confusingly similar to any such GREEN PLACES-owned/used mark, logo, or name) as Customer's own, whether as a trademark, service mark, certification mark, trade name, domain name, or “doing business as” name (“d/b/a”), alone or in combination with Customer's own trademarks or service marks.</li>
                                        <li>Prohibition on Assertion of Rights.  Customer agrees not to assert any rights in the Licensed Marks against GREEN PLACES, any Member of GREEN PLACES, any Other Customers, or their Affiliates, or to object to the use of the Licensed Marks by such parties.</li>
                                        <li>Required Use of the Licensed Marks. Customer agrees that when it refers to the Licensed Marks, it will use the Licensed Marks or use some other means to accurately describe GREEN PLACES as the origin of the Licensed Marks. All such use of the Licensed Marks shall inure to the benefit of GREEN PLACES.</li>
                                        <li>No Warranty. Customer uses the Licensed Marks at its own risk.</li>
                                    </ol>
                                </li>
                                <li>
                                    <b>Term and Termination.</b>
                                    <ol>
                                        <li>Effective Date. This Agreement commences on the Effective Date and, unless terminated in accordance with this Section 3, will continue for one (1) year (the “Initial Term”).  Following the expiration of the Initial Term, this Agreement will automatically renew for additional one (1)-year periods (each a “Renewal Term” and, together with the Initial Term, the “Term”)) unless either Customer or GREEN PLACES provided the other with notice of non-renewal at least thirty (30) days prior to the expiration of the Initial Term or the then-current Renewal Term.  The Fee for each Renewal Term shall be due and payable on or before each subsequent annual anniversary date of the Effective Date.</li>
                                        <li>Customer shall be considered in default hereunder, and GREEN PLACES may terminate this Agreement with respect to any or all Licensed Marks upon: (a) the material breach by Customer of this Agreement or any other agreement between Customer and GREEN PLACES, if such breach is not cured within thirty (30) days of the date GREEN PLACES provides Customer with written notice of such breach or (b) failure to pay any Fees due to GREEN PLACES, if such Fee is not paid in full within thirty (30) days of becoming due and payable.</li>
                                        <li>Customer may terminate this Agreement at any time with respect to the Licensed Marks by providing written notice to GREEN PLACES. Fees paid by Customer are nonrefundable.</li>
                                        <li><b>Upon any termination of this Agreement: (a) all rights and licenses granted to Customer hereunder for the Licensed Marks shall terminate and Customer shall cease all use of the Licensed Marks and (b) the licenses granted to GREEN PLACES pursuant to Section 1.2 of this Exhibit A shall survive.</b></li>
                                    </ol>
                                </li>
                                <li>
                                    <b>General.</b>
                                    <ol>
                                        <li>No Warranty. The parties acknowledge that all information provided by GREEN PLACES is provided “AS IS” WITH NO WARRANTIES WHATSOEVER, WHETHER EXPRESS, IMPLIED, STATUTORY, OR OTHERWISE, AND GREEN PLACES EXPRESSLY DISCLAIMS ANY WARRANTY OF MERCHANTABILITY, NONINFRINGEMENT, FITNESS FOR ANY PARTICULAR PURPOSE, OR ANY OTHER WARRANTY.</li>
                                        <li>Limitation of Liability. IN NO EVENT WILL GREEN PLACES OR ITS LICENSORS BE LIABLE TO ANY OF GREEN PLACES’S MEMBERS, CUSTOMER, OR ANY OTHER PERSON FOR THE COST OF PROCURING SUBSTITUTE GOODS OR SERVICES, LOST PROFITS, LOST BUSINESS, LOST DATA, OR LOSS OF USE; OR FOR ANY DIRECT, INDIRECT, INCIDENTAL, CONSEQUENTIAL, PUNITIVE, OR SPECIAL DAMAGES, WHETHER UNDER CONTRACT, TORT, WARRANTY, OR OTHERWISE, ARISING IN ANY WAY OUT OF THIS OR ANY OTHER RELATED AGREEMENT, WHETHER OR NOT GREEN PLACES OR ITS LICENSORS HAD ADVANCE NOTICE OF THE POSSIBILITY OF SUCH DAMAGES</li>
                                        <li>Carbon Offsets and Carbon Calculations.  Customer acknowledges that any carbon offsets purchased using all or any portion of the Fee will be held in the name of GREEN PLACES or its designee and shall not, under any circumstances, be considered to be the property of the Customer.  Customer acknowledges and agrees that GREEN PLACES’s carbon calculations are estimates only and are based wholly on the accuracy of the information provided by Customer about Customer’s business and GREEN PLACES’s assumptions based thereon.</li>
                                        <li>Governing Law; Jurisdiction; Arbitration; Venue; Language.  This Agreement shall be construed and controlled by the laws of the State of North Carolina, without giving effect to conflict-of-law principles.  The parties agree that all disputes arising in any way out of this Agreement that cannot be resolved by good faith discussion will be settled by final and binding arbitration in Raleigh, North Carolina, U.S.A., under the then-current Commercial Arbitration Rules of the American Arbitration Association with the reasonable costs of such arbitration split equally between such parties and with the prevailing party therein entitled to recover its reasonable legal fees and costs thereby incurred, including attorneys’ and experts’ fees. Any such arbitral award may be enforced in a court of competent jurisdiction. For purposes of enforcement, the parties irrevocably consent to jurisdiction and venue in the state and Federal courts of the State of North Carolina. This Agreement has been written in the English language and it may be translated by Customer at its own cost and for its own convenience and internal purposes. However, the official version of this Agreement and the one that shall govern and prevail in all cases, including the case of any difference or disagreement with any such translation, is the English language version.</li>
                                        <li>Affiliates.  Customer hereby represents and warrants that it has power to cause all trademarks owned or controlled by it and all of its Affiliates to be licensed as set forth in this Agreement. If Customer breaches the foregoing representation and warranty such that trademarks owned or controlled by any such Affiliate are not licensed as set forth in this Agreement, then Customer shall indemnify and hold harmless GREEN PLACES and any Other Customers of the Licensed Marks from and against any royalties/fees, liability, or damage incurred by GREEN PLACES or its Affiliates as a result of the failure to obtain such license.  Customer shall be liable for all acts or omissions of its Affiliates. Notwithstanding the foregoing, this Agreement shall not confer any rights on such Affiliates as third- party beneficiaries or otherwise; any of Customer's Affiliates that wish to use any Licensed Marks may do so only after accepting in writing a proposal from GREEN PLACES.</li>
                                        <li>Complete Agreement.  This Agreement sets forth the entire understanding of the parties and supersedes all prior agreements and understandings relating hereto, including, but not limited to, any prior Terms of Usage Agreement between GREEN PLACES and Customer; provided, however, that, any GREEN PLACES policy regarding intellectual property or privacy and data usage shall also apply to Customer, and, in the event of any inconsistency between any such policy and this Agreement, the policy shall govern. For the avoidance of doubt, the terms and conditions contained in this Agreement will apply to the license of any Licensed Marks previously licensed by Customer under any earlier version of GREEN PLACES's Terms of Usage Agreement.</li>
                                        <li>No Waiver. The waiver of any breach or default will not constitute a waiver of any other right hereunder or any subsequent breach or default.</li>
                                        <li>Counterparts. This Agreement may be executed in one or more counterparts, each of which shall be deemed an original, but collectively shall constitute one and the same instrument.</li>
                                        <li>Compliance with Laws. Anything contained in this Agreement to the contrary notwithstanding, the obligations of the parties hereto shall be subject to all laws, present and future, of any government having jurisdiction over the parties hereto, and to orders, regulations, directions, or requests of any such government.</li>
                                        <li>Force Majeure. No party shall be liable hereunder by reason of any failure or delay in the performance of its obligations hereunder on account of strikes, shortages, riots, insurrection, fires, flood, storm, explosions, acts of God, war, acts of terrorism, governmental action, labor conditions, earthquakes or other natural disaster, or any other cause that is beyond the reasonable control of such party.</li>
                                        <li>Import and Export Controls. In connection with this Agreement, the parties shall comply with all applicable laws, including export, re-export, and foreign policy controls and restrictions that may be imposed by any government.</li>
                                        <li>Third-Party Beneficiaries. Other Customers are intended third-party beneficiaries of Sections 1.2 and 4.3 of this Exhibit A, and all Members and GREEN PLACES are intended third- party beneficiaries of Section 2.2 of this Agreement, for the sole purpose of enforcing directly against Customer the rights and covenants provided thereunder.</li>
                                        <li>Publicity. Customer consents to the public disclosure and use of its name and logo for purposes of publicly promoting GREEN PLACES and the Licensed Marks. </li>
                                        <li>No Other Rights. Except as expressly set forth above, this Agreement shall not be construed as granting any rights or interests in or to the proprietary rights of any party to this Agreement or any third party.</li>
                                        <li>Notices. All notices hereunder shall be sent to the addresses indicated on the proposal provided to Customer by GREEN PLACES.  For purposes of this Section, notice can include notice by written mail, electronic mail, or by facsimile. Such notices shall be deemed served when sent.  Any party may give written notice of a change of address and, after notice of such change has been received, any notice or request shall thereafter be given to such party at such changed address.</li>
                                        <li>Name Change. GREEN PLACES may change its name or the design of any of the Licensed Marks or the name by which this Agreement is identified. However, no such name change shall have any effect on the rights and obligations of the parties under this Agreement.</li>
                                        <li>Headings. The parties acknowledge that the headings to the sections hereof are for reference purposes only and shall not be used in the interpretation of this Agreement.</li>
                                        <li>Assignment. Customer may not assign its rights or obligations under this Agreement without the prior written consent of GREEN PLACES. For purposes of this Agreement, an assignment shall be deemed to include a transfer or sale of all or substantially all of the business of Customer, or a merger, consolidation, or other transaction that results in a change in control of Customer. Any purported assignment in violation of this Section shall be void.</li>
                                        <li>Successors.  The terms and provisions of this Agreement will be binding upon and inure to the benefit of GREEN PLACES’s successors and assigns.</li>
                                    </ol>
                                </li>
                                <li>
                                    <b>Definitions.</b>
                                    <p>The following terms shall have the following meanings in this Agreement.</p>
                                    <ol>
                                        <li>“Affiliate” means, without limitation, any individual, corporation, partnership, sole proprietorship, joint venture, business unit or division, employee benefit plan, trust, or other enterprise that, directly or indirectly through one or more intermediaries, controls, is controlled by, or is under common control with, another entity, so long as such control exists.</li>
                                        <li>“Control” means (a) direct or indirect beneficial ownership of or the right to exercise decision-making authority with respect to (i) more than fifty percent (50%) of the voting stock or equity in an entity; or (ii) more than fifty percent (50%) of the relevant ownership interest or decision-making authority representing the right to make the decisions for the subject entity in the event that there is no voting stock or equity; or (b) actual working control of an entity, in whatever manner exercised, including, but not limited to, the right, through a management agreement or otherwise, to direct how the intellectual property of an entity is protected, used, or licensed to others or how the day-to-day operations of the entity are conducted.</li>
                                        <li>“Effective Date” means the later of (i) the date on which GREEN PLACES receives the first payment from a Customer or (ii) the date on which a Customer accepts in writing a proposal from GREEN PLACES.</li>
                                        <li>“Fee” means the fee agreed to by Customer and GREEN PLACES in a proposal from GREEN PLACES.</li>
                                        <li>“Identity Guidelines” means guidelines available on the GREEN PLACES website that have been developed by GREEN PLACES to ensure the accurate and consistent use of its trademarks, logos, and other identity elements by third parties.</li>
                                        <li>“Licensed Marks” means any registered or unregistered trademarks used by GREEN PLACES and which GREEN PLACES has provided Customer with written permission to use.</li>
                                        <li>"Member" means any company, organization, or other entity that applies for and is accepted by GREEN PLACES into any class of voting or nonvoting membership.</li>
                                        <li>“Other Customers” means (a) all Members of GREEN PLACES; and (b) any other Person that has entered into an agreement substantially similar to this Agreement with GREEN PLACES.</li>
                                        <li>"Person” means any individual, corporation, partnership, sole proprietorship, joint venture, trust, limited liability company, business association, governmental entity, or other entity.</li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')

 
@endpush