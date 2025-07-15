# initial setup
import openai
from dotenv import find_dotenv, load_dotenv

load_dotenv()

client = openai.OpenAI()
model = "gpt-4o"

# # creating assistant

# uni_web_ass = client.beta.assistants.create(
#     name = "university website",
#     instructions = """
#              you are an ai assistant that helps university students with their problems and scientific questions and you have a good foundation in general knowledge and you know all languages and you can reply to students questions in different languages
#       """,
#     model=model
# ) 



# # creating thread

# thread  = client.beta.threads.create(
#     messages = [
#         {
#             "role":"user",
#             "content":"what is your name"
#         }
#     ]
# )
# print(uni_web_ass.id)
# print(thread.id)





# creating message/

message = "how to focus on classes ?"
message = client.beta.threads.messages.create(
    thread_id=th_id,
    role='user',
    content=message
)


# running assis

run = client.beta.threads.runs.create(
    thread_id=th_id,
    assistant_id=assis_id,
    instructions='please address the user as a really intelligent person'
)