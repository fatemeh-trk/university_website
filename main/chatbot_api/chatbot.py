# initial setup

import time
import logging
from datetime import datetime
import openai
from dotenv import find_dotenv, load_dotenv



load_dotenv()

client = openai.OpenAI()
model = "gpt-4o"

# creating assistant

uni_web_ass = client.beta.assistants.create(
    name = "university website",
    instructions = """
             you are an ai assistant that helps university students with their problems and scientific questions and you have a good foundation in general knowledge and you know all languages and you can reply to students questions in different languages
      """,
    model=model
) 



# creating thread

thread  = client.threads.create(
    messages = [
        {
            "role":"user",
            "content":"what is your name"
        }
    ]
)
print(uni_web_ass.id)
print(thread.id)


assis_id = "asst_9YKyOwSL2FgOdRN7fUJi0FPu"
th_id = "thread_fPphp4wptcdk5rvI98Jso5Qs"



# creating message/

# message = "how to focus on classes ?"
message = client.threads.messages.create(
    thread_id=th_id,
    role="user",
    content="how to focus on classes ?"
)


# running assis

run = client.threads.runs.create(
    thread_id=th_id,
    assistant_id=assis_id,
    instructions='please address the user as a really intelligent person'
)

def wait_for_run_completion(client,thread_id,run_id,sleep_interval=5):
    while True:
        try:
            run = client.beta.threads.runs.retrieve(thread_id=th_id,run_id=run_id)
            if run.completed_at:
               elapsed_time = run.completed_at - run.created_at
               formatted_elapsed_time = time.strftime(
                   "%H:%m:%S", time.gmtime(elapsed_time)
               )
               print(f"Run completed in {formatted_elapsed_time}")
               logging.info(f"run completed in {formatted_elapsed_time}")

               messages = client.beta.threads.messages.list(thread_id = th_id)
               last_message = messages.data[0]
               response = last_message.content[0].text.value
               print(f"assistant response : {response}")
               break
        except Exception as e:
            logging.error(f"an error occured while retrieving the run : {e}")
            break
        
        logging.info("waiting for run to complete ...")
        time.sleep(sleep_interval)    
            
wait_for_run_completion(client=client,thread_id=th_id,run_id=run.id)            

# ======steps --- logs =====
run_steps = client.threads.runs.steps.list(run_id=run.id,thread_id=th_id)
# print(run_steps.data[0])


      
